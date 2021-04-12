import unittest
from selenium import webdriver
import page_objects.home

class homePageLoad(unittest.TestCase):
    # A  test class for checking if the page was loaded properly

    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("Website URL")

    def test_home_page(self):
        # Tests to see if page elements successfully loads
        # and user name is successfully displayed after login

        homePage = page_objects.home.HomePage(self.driver)
        # Checks if "Smart Attendance" is in the page title
        assert page.title_matches(), "Title doesn't match."

        # Checks if sign in was successful by checking if 
        # user name is successfully displayed

        expectedResult=""
        actualResult= homePage.get_user_name.get_attribute("textContent")
        self.assertEqual(actualResult, expectedResult)
 

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()
