import requests
from bs4 import BeautifulSoup

url = 'https://www.ismo.ma/emploisphp/emplois.php'
response = requests.get(url)
soup = BeautifulSoup(response.text, 'html.parser')

dateEmp = soup.find('p')
print(dateEmp)