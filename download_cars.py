import urllib.request
import json
import os
import time

cars = [
    ("Toyota_Avanza", "avanza.jpg"),
    ("Toyota_Innova", "innova.jpg"),
    ("Honda_Brio", "brio.jpg"),
    ("Mitsubishi_Xpander", "xpander.jpg"),
    ("Toyota_Fortuner", "fortuner.jpg"),
    ("Honda_CR-V", "crv.jpg"),
    ("Toyota_Alphard", "alphard.jpg"),
    ("Suzuki_Ertiga", "ertiga.jpg"),
    ("Daihatsu_Xenia", "xenia.jpg"),
    ("Honda_HR-V", "hrv.jpg"),
    ("Toyota_Rush", "rush.jpg"),
    ("Daihatsu_Terios", "terios.jpg"),
    ("Suzuki_Ignis", "ignis.jpg"),
    ("Honda_Civic", "civic.jpg"),
    ("Toyota_Camry", "camry.jpg"),
    ("Mitsubishi_Pajero_Sport", "pajero.jpg"),
    ("Nissan_Livina", "livina.jpg"),
    ("Wuling_Confero", "confero.jpg"),
    ("Hyundai_Creta", "creta.jpg"),
    ("Toyota_Raize", "raize.jpg")
]

os.makedirs("storage/app/public/vehicles", exist_ok=True)
opener = urllib.request.build_opener()
opener.addheaders = [('User-Agent', 'RentCarAppBot/1.0 (contact@rentcar.com) Python-urllib/3')]
urllib.request.install_opener(opener)

for title, filename in cars:
    try:
        url = f"https://en.wikipedia.org/w/api.php?action=query&titles={title}&prop=pageimages&format=json&pithumbsize=800"
        print(f"Fetching {title}...")
        with urllib.request.urlopen(url) as response:
            data = json.loads(response.read().decode())
            pages = data['query']['pages']
            page = list(pages.values())[0]
            if 'thumbnail' in page:
                image_url = page['thumbnail']['source']
                print(f"Found image: {image_url}")
                urllib.request.urlretrieve(image_url, f"storage/app/public/vehicles/{filename}")
            else:
                print(f"No image found for {title}, using placeholder.")
                urllib.request.urlretrieve(f"https://placehold.co/800x600/png?text={title.replace('_', '+')}", f"storage/app/public/vehicles/{filename}")
    except Exception as e:
        print(f"Error fetching {title}: {e}")
        try:
            urllib.request.urlretrieve(f"https://placehold.co/800x600/png?text={title.replace('_', '+')}", f"storage/app/public/vehicles/{filename}")
        except:
            pass
    time.sleep(2)

print("Done downloading images.")
