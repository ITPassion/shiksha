Unzip the code in your www dir if you are using wamp
or htdocs if you are using xampp

if your browser is running.

Browse the url http://localhost/shiksha/

You will see a form where once you select the user type and hit the submit button

You will reach to another form where you can submit the user ids.

Test Cases:

Index page:
1. By Default the submit button is disabled.
2. When you select either Basic or premium user the submit button will be enabled
3. if you again unselect the user type the submit button will be disabled again, which means you are only allowed to submit form with valid user type.

Home Page:
1. When you first reach the form you will see one input box with placeholder "Enter valid ip address" and a plus, submit and reset button.
2. By default the submit button is disabled.
3. The submit button will only be enabled if we have either all valid ip address or atleast one valid ip address and rest blank input fields.
4. Basic user can add upto 5 ip addresses, after this limit the plus icon will be removed.
5. Premium user can add upto 10 ip addresses, after this limit the plus icon will be removed..
6. Duplicates are allowed
7. If there is only one row then only add/plus icon is displayed
8. If there are more than one rows then minus icon will be displayed for all the rows
