<?php
require_once("../Model/Customer.php");

//Database connection.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $conn->close();
} 

#gets the model for the index view.
function IndexModel()
{
    $customer = new Customer("Luke","Anderson",18);	
    return $customer;
}

#gets the model for the View-Users view.
function ViewUsersModel()
{
    global $conn;

    $SQL = "SELECT * FROM customer";
    $stmt = $conn->prepare($SQL);


    if (!$stmt->execute()) 
    {
        echo "falure to execute SQL to to get all customers";
    } 

    $result = $stmt->get_result();

    $customers = array();
    $params = array('fname','lname','age');


    while ($obj = mysqli_fetch_object($result))
    {
        $customer = new Customer($obj->fname,$obj->lname,$obj->age);
        array_push($customers,$customer);
    }






    
    $stmt->close();
    $conn->close();


    return $customers;



}


function makeCustomerObject($id,$fname,$lname,$age)
{




}





#adds a customer to the mySql database
function AddCustomer($customer)
{
    global $conn;

    if(!is_a($customer,'Customer'))
    {
        echo "error: trying to add something that is not a customer";
    }


    # prepare and bind

    #INSERT INTO users (username, password, email_address) VALUES (?, ?, ?)
    $SQL = "INSERT INTO customer (fname, lname, age) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($SQL);
    $stmt->bind_param("sss", $fname, $lname, $age);

    # set parameters and execute
    $fname = htmlspecialchars($customer->getFname());
    $lname = htmlspecialchars($customer->getLname());
    $age = htmlspecialchars($customer->getAge());

    if (!$stmt->execute()) 
    {
        echo "falure to execute SQL to insert customer";
    } 

    
    $stmt->close();
    $conn->close();





    
    /*
    XSS:
    htmlspecialchars prevents XSS attacks.
    
    SQL injection:
    data is santized when using prepared statments like above. Prepared statements is the go to way to
    for preventing SQL injection.
    
    
    Otherwise you have to sanatize the data using mysqli_real_escape_string like so
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    
    However mysqli_real_escape_string is not 100% safe against SQL injection.
    You have to use something like a strict whitelist to be sure you are secure in preventing SQL injection.
    */


}