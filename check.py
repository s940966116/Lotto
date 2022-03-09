import sys
import requests
from bs4 import BeautifulSoup

num_input = sys.argv[1]
num_check = sys.argv[2:]

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
        result1 = num_list[i]        
    
result2 = list()    
for i in num_check:
    if i in result1:
        if i == result1[len(result1)-1]:
            result2.append(i + "(special number)")
        else:
            result2.append(i)
            
for i in range(len(result2)):
    if i == len(result2)-1:
        print(result2[i], end = "")
    else:
        print(result2[i], end = " ")