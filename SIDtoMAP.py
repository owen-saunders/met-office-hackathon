import pandas as pd
import geopandas as gpd
from shapely.geometry import Point
import folium
from IPython.display import HTML, display
from itertools import cycle
from geopy.distance import great_circle
import argparse

# Get data in portions to not overload memory
# fields = {'SID', 'YEAR', 'BASIN', 'SUBBASIN', 'NAME', 'LAT', 'LON', 'WMO_WIND' 'STORM_SPEED', 'STORM_DIR'} # -- {0,1,2,3,4,8,9,10,161,162}
df_chunks = pd.read_csv('./ibtracs.ALL.list.v04r00.csv', chunksize=2000, usecols=[0,1,2,3,4,7,8,9,10,161,162], engine='python')
mylist = []
for chunk in df_chunks:
    mylist.append(chunk)
df = pd.concat(mylist, axis= 0)

# Convert to geodata with different epsg
crs = {'init':'epsg:4326'}

geometry = [Point(x,y) for x,y in zip(df['LON'], df['LAT'])]
geo_df = gpd.GeoDataFrame(df, crs = crs, geometry = geometry).to_crs(epsg=3857)

parser = argparse.ArgumentParser()

parser.add_argument('-s', dest='sids', action='append', help="Provide a SID")

#### USER INPUT HERE - REQUIRES SID
arg = parser.parse_args()
print(arg)
Map = folium.Map(location=[50.71984,-3.53019], zoom_start=2)
selected = []
selected.append(geo_df[geo_df["SID"] == arg])

# Display MAP
colors = {"NR":"blue","MX":"aqua","DS":"green","SS":"yellow","TS":"orange","ET":"red"}
counter = 0
for Storm in selected:
    counter += 1
    if counter == 10: break
    firstMarker = True

    if Storm["NATURE"].all() == "NR": StormColor = "blue"
    elif Storm["NATURE"].all() == "DS": StormColor = "green"
    elif Storm["NATURE"].all() == "SS": StormColor = "yellow"
    elif Storm["NATURE"].all() == "TS": StormColor = "orange"
    elif Storm["NATURE"].all() == "ET": StormColor = "red"
    elif Storm["NATURE"].any() == "MX": StormColor = "aqua"
    else: StormColor = "black"
        
    for LAT,LON,speed,direction in zip(Storm["LAT"],Storm["LON"],Storm["STORM_SPEED"], Storm["STORM_DIR"]):    
        if not firstMarker:
            folium.PolyLine(locations=[[prev_LAT,prev_LON],[LAT,LON]], color=StormColor).add_to(Map)
        folium.RegularPolygonMarker(location=[LAT,LON], color=StormColor, number_of_sides=3, radius=5, rotation=direction, popup="Speed: " + str(speed) + "m/s\n Direction: " + str(direction) + "°").add_to(Map)
        firstMarker = False
        prev_LAT = LAT
        prev_LON = LON

legend_html = '''
    <div style=”position: fixed; 
     bottom: 50px; left: 50px; width: 100px; height: 90px; 
     border:2px solid grey; z-index:9999; font-size:14px;
     “>&nbsp; Cyclone Class <br>
     &nbsp; NR &nbsp; <i class=”fa fa-map-marker fa-2x”
                  style=”color:blue”></i><br>
     &nbsp; MX &nbsp; <i class=”fa fa-map-marker fa-2x”
                  style=”color:aqua”></i><br>
     &nbsp; DS &nbsp; <i class=”fa fa-map-marker fa-2x”
                  style=”color:green”></i><br>
     &nbsp; SS &nbsp; <i class=”fa fa-map-marker fa-2x”
                  style=”color:yellow”></i><br>
     &nbsp; TS &nbsp; <i class=”fa fa-map-marker fa-2x”
                  style=”color:orange”></i><br>
     &nbsp; ET &nbsp; <i class=”fa fa-map-marker fa-2x”
                  style=”color:red”></i>
      </div>
    '''

Map.get_root().html.add_child(folium.Element(legend_html))

display(Map)
