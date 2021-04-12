import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support.expected_conditions import presence_of_element_located

import page_objects.sign_in

class pageSignUp(unittest.TestCase):
    # A  test class for signing up

    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("Website URL")

    def test_login(self):
        # Test singing up on the website

        # Load the  page
        signupPage = page_objects.sign_up.SignUpPage(self.driver)

        # Provide user credentials to test with
        signupPage.first = ""
        signupPage.last = ""
        signupPage.pass1 = ""
        signupPage.pass2 = ""
        signupPage.email = ""
        signupPage.category = ""

        signupPage.click_submit()

        alert = wait.until(expected_conditions.alert_is_present())
        assert alert.text == "Well Done. You have been registered successfully"

        # Press the OK button
        alert.accept()
        alert.dismiss()
        
        # Check whether the browser was routed to the sign in page
        # if sign up was successful 
        actual_result = self.driver.getCurrentUrl()
        expected_result = "/view/sign_in.php"

        self.assertEqual(actual_result, expected_result)

        

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()