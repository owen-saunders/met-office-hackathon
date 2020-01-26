import argparse

# append action allows to group repeating
# options

parser = argparse.ArgumentParser()

parser.add_argument('SID', help="Provide a SID")
   
parser.add_argument('-lt', dest='lats', action='append', 
    help="Provides a Latitude")

parser.add_argument('-ln', dest='lons', action='append', 
    help="Provides a Longitude")

args = parser.parse_args()

print(args.SID)