import sys
import requests
from bs4 import BeautifulSoup
        
def get_web_page(url):
    resp = requests.get(url)
    if resp.status_code != requests.codes.ok:
        print("Error!")
    else:
        return resp.text
    
url = "https://en.lottolyzer.com/number-frequencies/taiwan/lotto-649"
page = get_web_page(url)

soup = BeautifulSoup(page, 'html.parser')
div = soup.find_all("tr")
div = div[2:]

total_num = 0
frequence_percentage_list = dict()

n = 0
for block in div:
    num1 = block.find("td")
    num2 = block.find("td", "freq-p1")
    total_num += (int)(num2.text)
    frequence_percentage_list[n] = [num1.text, num2.text]
    n += 1
    
for i in frequence_percentage_list:
    percent = (int)(frequence_percentage_list[i][1]) / total_num
    temp = round(percent*100,2)
    frequence_percentage_list[i].append(temp)
    
for i in frequence_percentage_list:
    for j in range(len(frequence_percentage_list[i])):
        if j == len(frequence_percentage_list[i])-1:
            print(frequence_percentage_list[i][j], end = ",\n")
        else:
            print(frequence_percentage_list[i][j], end = ",")

