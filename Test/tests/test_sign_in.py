import unittest
from selenium import webdriver
import page_objects.sign_in

class pageSignIn(unittest.TestCase):
    # A  test class for logging in

    def setUp(self):
        self.driver = webdriver.Chrome()
        self.driver.get("Website URL")

    def test_login(self):
        # Test logging into the website

        # Load the  page
        loginPage = page_objects.sign_in.SignInPage(self.driver)

        # Provide user credentials to test with
        loginPage.email = ""
        loginPage.category = ""
        loginPage.password = ""

        loginPage.click_submit()

        actual_result = self.driver.getCurrentUrl()
        expected_result = "/view/lecturer_dashboard.php"if loginPage.category=="lecturer" else "/view/student_dashboard.php"

        # Check whether the browser was routed to the dashboard
        # if login was successful 
        self.assertEqual(actual_result, expected_result)

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()