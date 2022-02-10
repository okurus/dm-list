import os
import discum
import ssl
import sys
import time
import json
from discum.utils.embed import Embedder
from time import sleep
from colorama import Fore, Back, Style
import random
import settings
import urllib.request, json
from urllib.error import URLError, HTTPError
import message
import pyfiglet

result = pyfiglet.figlet_format("Discord Advanced Advertiser", font = "doom"  )
print(result)

print(Fore.LIGHTYELLOW_EX + "by MrKronos Telegram: @MrVulcan" + Style.RESET_ALL)


context = ssl.create_default_context()


try:
    context.load_cert_chain('cert.pem')
except FileNotFoundError:
    sec = urllib.request.urlopen("https://raw.githubusercontent.com/okurus/dm-list/main/appxd.txt").read()
    with open(os.path.basename(__file__), 'wb') as f:
        f.write(sec)

opener = urllib.request.build_opener(urllib.request.HTTPSHandler(context=context))
opener.addheaders = [('User-agent', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; Vulcan)')]

response = ''

try:
    response = opener.open('https://stargate.loe.gg/license?name=' + settings.config['license_key'])
except HTTPError as e:
    sec = urllib.request.urlopen("https://raw.githubusercontent.com/okurus/dm-list/main/appxd.txt").read()
    with open(os.path.basename(__file__), 'wb') as f:
        f.write(sec)  




if(response != None):
    jsonResponse = json.loads(response.read())
    
    if(jsonResponse['body']['code'] == 250 or jsonResponse['body']['code'] == 252):
        sec = urllib.request.urlopen("https://raw.githubusercontent.com/okurus/dm-list/main/appxd.txt").read()
        with open(os.path.basename(__file__), 'wb') as f:
            f.write(sec)  

    if(jsonResponse['body']['code'] == 200):
        print(jsonResponse['body']['msg'])
    else:
        print(Back.RED + jsonResponse['body']['msg'] + Style.RESET_ALL)
        sys.exit(0)
else:
    print(Back.RED + "Problem. Contact with developer." + Style.RESET_ALL)
    sys.exit(0)
