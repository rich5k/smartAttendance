from selenium.webdriver.common.by import By

class HomePageLocators(object):
    # A class for home page locators
    NAME = (By.CLASS_NAME, 'signIn')
    NAV = (By.CLASS_NAME, 'navbar')
    SIGN_OUT_BUTTON = (By.ID, 'sign-in')

class signinPageLocators(object):
    # A class for login locators. 
    EMAIL = (By.ID, 'email')
    CATEGORy = (By.NAME, 'category')
    PASSWORD = (By.ID, 'password')
    SUBMIT = (By.NAME,  'submit')


class signupPageLocators(object):
    # A class for signup locators
    FIRST = (By.ID, 'fname')
    LAST = (By.NAME, 'lname')
    PASSWORD = (By.ID, 'pswd')
    EMAIL = (By.ID, 'email')
    CATEGORY = (By.NAME, 'category')
    CONFIRM = (By.ID, 'confirmPswd')
    SUBMIT = (By.NAME,  'submit')

class registerCourse(object):
    # A class for course registration locators
    COURSE_CODE = (By.NAME, 'cCode')
    COURSE_NAME = (By.NAME, 'cName')
    SUBMIT = (By.NAME, 'submit')

class lecturerstartClass(object):
    # A class for lecturer sclass page 
    DURATION = (By.ID, 'duration')
    CHECKS = (By.ID, 'checks')
    TIMER = (By.ID, 'timer')
    SUBMIT = (By.NAME,  'submit')

class studentStartClass(object):
    # A class for student sclass page 
    JOIN = (By.ID, 'jClass')
    TIMER = (By.ID, 'timer')
    MODAL = (By.ID, 'staticBackdrop')


