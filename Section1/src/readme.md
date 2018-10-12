****​Simple​ ​codes for HTTP Methods****
***How To Run The Servers***

*Run DB Server*
```
php -S localhost:7070 data.json
```
*Run backed Server*
```
php -S localhost:5050 -t HTTP/
```

*Run Frontend Server*
```
php -S localhost:3030 -s View/
```
**How to access to the "homepage"!**

*Get Following url*
```
http://localhost:3030/list.html
```



***Using​ ​simple​ ​code,​ ​explain​ ​what​ ​kind​ ​of​ ​situations​ ​would​ ​you​ ​use​ ​the​ ​methods:***

**i. GET**

**GET:**
 *The HTTP GET method is used to retrieve, read or get data. GET returns in XML or JSON format and an HTTP response code of * 200 (OK). In an error case, it is normally returns a 400 "BAD REQUEST" or 404 "NOT FOUND".
In PHP one of the famous library is GuzzleHttp\Client that can be one of or dependencies. There is another library which * is Added in PHP 5 and older which is cURL or file_get_contents*

**ii. POST**

**POST:**
 *The HTTP POST method is used to add or create a new data in the resources collection. POST returns in XML or JSON format and an HTTP response code of * 200 (OK) , 201 (Created) or 204 (No Content).*

**iii. DELETE**

**DELETE:**
*The HTTP DELETE method is used Use to delete existing resources . An HTTP response code of * 200 (OK), 202 (Accepted) or 204 (No Content). In an error case, it is normally returns a 404 "NOT FOUND".*

**iv. PUT**

**PUT:**
 *The HTTP POST method is used Use to update existing resource . An HTTP response code of * 200 (OK), 201 (Created) or 204 (No Content). In an error case, it is normally returns a 404 "NOT FOUND".*



***Explain​ ​in​ ​your​ ​own​ ​words,​ ​what​ ​kind​ ​of​ ​“authentication”​ ​works​ ​best​ ​for​ ​a​ ​web​ ​service that​ ​needs​ ​to​ ​be​ ​secure,​ ​yet​ ​easy​ ​to​ ​implement​ ​across​ ​different​ ​programming​ ​languages. You​ ​may​ ​want​ ​to​ ​give​ ​an​ ​example​ ​of​ ​how​ ​to​ ​call​ ​this​ ​API.***



*It would be better if the Restful Api be a stateless, that means request should come with some kind of authentication credentials that give us ability to not be depended on cookies or sessions.
Using HTTPS for every request will add a layer to the security protection.*
*With authentication credentials can use SSL to transferred a randomly generated access token.*

*It is better to specified the token specified in a header or query string parameter. For security reasons, providing the token in a header is the preferred method, because a request URL may be logged by proxies or web servers. The browser will just popup a prompt asking for credentials if it receives a 401 Unauthorized status code from the server.*

*JSON Web Token is a JSON-based open standard for creating access tokens that assert some number of claims.*

*Some famous framework for Api Authentication are :*

*OAuth 2*

*Swagger*

 ***hat​ ​kind​ ​of​ ​format​ ​is​ ​best​ ​to​ ​be​ ​returned​ ​by​ ​an​ ​API​ ​as​ ​a​ ​response?​ ​Explain​ ​your answer​ ​and​ ​provide​ ​comparisons,​ ​if​ ​needed.***
 
 *I normally use Json format to transfer HTTP requests and de reason I am using it because it would be smaller than XML and for the response correct date which does not have any error I use following format:*
 
 ```
{ 
    "id":1,
    "name":"gizmo fwr",
    "age":"22",
    "job":"dev"
}
```
*For collection*

```
[
    {"id":1,
        "name":"john doe",
        "age":"22",
        "job":"developer"
    },
    {
        "id":2,
        "name":"jane doe",
        "age":"44",
        "job":"dockter"
    },
    {
        "id":3,
        "name":"Dariush M",
        "age":"33",
        "job":"teacher"
    }
]
```
*If there was an error*

```
{
   "error": {
      "message": "Bad request.",
   }
}
```
