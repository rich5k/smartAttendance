from selenium.webdriver.support.ui import WebDriverWait


class PageTextElement(object):
    # Class that is initialized on page objects with input fields 

    def __set__(self, obj, value):
        # Sets the text to the value supplied
        driver = obj.driver
        WebDriverWait(driver, 100).until(
            lambda driver: driver.find_element_by_name(self.locator))
        driver.find_element_by_name(self.locator).clear()
        driver.find_element_by_name(self.locator).send_keys(value)

    def __get__(self, obj, owner):
        # Gets the text of the specified object
        driver = obj.driver
        WebDriverWait(driver, 100).until(
            lambda driver: driver.find_element_by_name(self.locator))
        element = driver.find_element_by_name(self.locator)
        return element.get_attribute("value")