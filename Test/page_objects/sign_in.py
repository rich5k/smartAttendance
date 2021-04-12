from locators import signinPageLocators
from element import PageTextElement
from base_page import BasePage



class SignInPage(BasePage):
    # sign_in.php page action methods 

    def get_email(self):
        # Returns
        input_box.locator = signinPageLocators.EMAIL
        self.email = input_box
        return self.email

    def get_category(self):
        # Returns
        input_box = PageTextElement()
        input_box.locator = signinPageLocators.CATEGORY
        self.email = input_box
        return self.category
    
    def get_password(self):
        # Returns
        input_box = PageTextElement()
        input_box.locator = signinPageLocators.PASSWORD
        self.email = input_box
        return self.email

    def click_submit(self):
        self.button = self.driver.find_element(signinPageLocators.SUBMIT)
        self.button.click()

