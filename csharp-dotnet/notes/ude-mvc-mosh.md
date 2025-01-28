


Asp.Net Mvc 5 Course Notes 

M. Hamadani


# S1

## Mvc Architectural Pattern

- Model : Application data and behaviour in terms of its problem domain, and independent of the UI

For example, Domain Model : Movie,Customer,Rental,Transaction

They are plain old clr objects (POCOs)

➖ View : The html markup that we display to the user.

➖ Controller : Responsible for handling an Http Request

for example, when we request `localhost.com/api/customers`, it send the request to the controller. and the controller does some works and then sends the request to the model and takes the answer and sends it to the view.


