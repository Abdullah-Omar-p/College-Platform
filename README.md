# [ [College MS Platform Project - API Documentation](#) ]

## Connect with the Developer

#### Feel free to reach out if you have any questions, suggestions, or just want to connect!

- **LinkedIn:** [Abdullah Omar](https://www.linkedin.com/in/abdullah-omar-81196420a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app)
- **WhatsApp:** [+01144393582](https://wa.me/01144393582)
- **Email:** [abdullahomarj1@gmail.com](abdullahomarj1@gmail.com)
- **Website:** [Eng-AbdullhOmar.online](https://www.eng-abdullahomar.online)
- **Telegram:** [@abdullahomar_p](https://t.me/abdullahomar_p)


# ``Description Summury``
#### this is and educational project for manage a college and add videos for courses and professors can add posts and there are quizzes has alot of questions and register courses and add professors to courses by super admin and there are control members that calculates students grades and then get grades of students.


# ``Authentication Endpoints``
### - [Login](#)
**``URL``**: /auth/login <br>
**``Method``**: POST <br>
**``Description``**: Authenticate a user and generate an access token. <br>
#### Request Body:
**``email``**: User's email <br>
**``password``**: User's password <br>
#### Response:
Returns an access token if authentication is successful. <br>

### - [Logout](#)
``URL``: /auth/logout <br>
``Method``: POST <br>
``Description``: Logout the currently authenticated user. <br>
``Authorization Header``: Bearer token <br>
#### Response:
Returns a success message upon successful logout. <br>