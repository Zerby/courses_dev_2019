from selenium import webdriver
from time import sleep

browser = webdriver.Chrome('./chromedriver')

browser.get("https://linkedin.com")

sleep(2)
email = browser.find_element_by_xpath('//*[@id="login-email"]')
password = browser.find_element_by_xpath('//*[@id="login-password"]')
login = browser.find_element_by_xpath('//*[@id="login-submit"]')
email.send_keys("clem.zerbi@gmail.com")
password.send_keys("Playors2204!")
login.click()

sleep(1)
msg = browser.find_element_by_xpath('//*[@id="messaging-nav-item"]/a')
msg.click()

sleep(2)
write_msg = browser.find_element_by_xpath('//*[@id="search-conversations"]')
write_msg.click()

sleep(1)
txt_msg = browser.find_element_by_xpath('//*[@id="ember1081"]')
txt_msg.send_keys("Benoit")

sleep(1.5)
#send = browser.find_element_by_xpath('//*[@id="ember1179"]/button')
#send.click()
