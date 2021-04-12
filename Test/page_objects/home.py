from locators import HomePageLocators
from base_page import BasePage

class HomePage(BasePage):
    # index.php page action methods 

    def title_matches(self):
        # Checks that "Smart Attendance" is in page title
        return "Smart Attendance" in self.driver.title

    def get_nav(self):
        # Returns navigation as webElement
        self.nav = self.driver.find_element(HomePageLocators.NAV)
        return self.nav
    
    def get_user_name(self):
        # Returns navigation as webElement
        self.user = self.driver.find_element(HomePageLocators.NAME)
        return self.user
    
    def get_sign_out(self):
        self.button = self.driver.find_element(HomePageLocators.SIGN_OUT_BUTTON)
        return self.button

