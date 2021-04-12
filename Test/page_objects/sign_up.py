from element import PageTextElement
from locators import signupPageLocators
from base_page import BasePage


class SignUpPage(BasePage):
    # Sign up page action methods 


    def get_first(self):
        # Returns...
        input_box = PageTextElement()
        input_box.locator = signupPageLocators.FIRST
        self.first = input_box
        return self.first

    def get_last(self):
        # Returns...
        input_box = PageTextElement()
        input_box.locator = signupPageLocators.LAST
        self.last = input_box
        return self.last

    def get_email(self):
        # Returns...
        input_box = PageTextElement()
        input_box.locator = signupPageLocators.EMAIL
        self.email = input_box
        return self.email

    def get_category(self):
        # Returns...
        input_box = PageTextElement()
        input_box.locator = signupPageLocators.CATEGORY
        self.category = input_box
        return self.category

    def get_password(self):
        # Returns...
        input_box = PageTextElement()
        input_box.locator = signupPageLocators.PASSWORD
        self.pass1 = input_box
        return self.pass1

    def get_confirm(self):
        # Returns...
        input_box = PageTextElement()
        input_box.locator = signupPageLocators.CONFIRM
        self.pass2 = input_box
        return self.pass2

    def click_submit(self):
        # Submits sign up form
        self.submit = self.driver.find_element(signupPageLocators.SUBMIT)
        element.click()