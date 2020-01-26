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

# Conversion to epsg:5387 not needed
crs = {'init':'epsg:4326'}
geometry = [Point(x,y) for x,y in zip(df['LON'], df['LAT'])]
geo_df_nearby = gpd.GeoDataFrame(df, crs = crs, geometry = geometry)

parser = argparse.ArgumentParser()

parser.add_argument('lats',  help="Provides a Latitude")

parser.add_argument('lons', help="Provides a Longitude")

#### USER INPUT HERE - REQUIRES LAT and LON
args = parser.parse_args()
lat = args.lats
lon = args.lons

def within_distance_of(lat,lon,distance):
    nearby = []
    for SID,LON,LAT in zip(geo_df_nearby["SID"],geo_df_nearby["LON"],geo_df_nearby["LAT"]):
        if great_circle((lat,lon),(LAT,LON)).km < distance: nearby.append((SID,LAT,LON))
    return nearby

nearby = within_distance_of(lat,lon,100)

MapNearby = folium.Map(location=[lat,lon])

colors = cycle(["aqua", "black", "blue", "fuchsia", "gray", "green", "lime", "maroon", "navy", "olive", "purple", "red", "silver", "teal", "yellow"])
SIDColors = {}

for SID,LAT,LON in nearby:    
    if SID not in SIDColors:
        SIDColors[SID] = next(colors)

    folium.vector_layers.CircleMarker(location=[LAT,LON], color=SIDColors[SID], popup=str(SID), radius=8, fill_color='blue').add_to(MapNearby)
display(MapNearby)