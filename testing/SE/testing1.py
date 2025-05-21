from msedge.selenium_tools import Edge, EdgeOptions
import unittest
class LoginTest(unittest.TestCase):
	def setUp(self):
		options = EdgeOptions()
		options.use_chromium = True
		self.driver = Edge(options=options)

	def test_valid_login(self):
		self.driver.get("http://localhost/restaurant/restaurant/includes/homepage/login_signup.php")
		username_field = self.driver.find_element_by_id("logemail")
		password_field = self.driver.find_element_by_id("logpass")
		username_field.send_keys("kk")
		password_field.send_keys("123456789")
		# Find and click the login button
		login_button = self.driver.find_element_by_name("login")
		login_button.click()
		# Assert that the user is successfully logged in by checking the
		new_url = self.driver.current_url
		if new_url == "http://localhost/restaurant/restaurant/admin/adminpanel.php":
			print("Admin Login successful!")

	def tearDown(self):
		window = self.driver.quit()
		test = LoginTest()
		test.setUp()
		test.test_valid_login()

test = LoginTest()
test.setUp()
test.test_valid_login()