import sys
import requests
from bs4 import BeautifulSoup

num_input = sys.argv[1]

def get_web_page(url):
    resp = requests.get(url)
    if resp.status_code != requests.codes.ok:
        print("Error!")
    else:
        return resp.text

url = "https://en.lottolyzer.com/history/taiwan/lotto-649/page/1/per-page/50/summary-view"

page = get_web_page(url)

soup = BeautifulSoup(page, 'html.parser')

tr = soup.find_all("tr")
tr = tr[2:]

num_list = dict()
for i in tr:
    issue = i.find("td").text
    num = i.find_all("td", "sum-p1")[1].text.replace(" ","").split(",")
    sup_num = i.find_all("td", "sum-p1")[2].text.replace(" ","")
    num_list[issue] = num
    num_list[issue].append(sup_num)

for i in num_list:
    if num_input == i:
        result = num_list[i]
        
for i in range(len(result)):
    if i == len(result)-1:
        print(result[i], end = "")
    else:
        print(result[i], end = " ")
    