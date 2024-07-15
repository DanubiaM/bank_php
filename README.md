## About This Project
This project is a web application designed to practice and improve concepts from software development such as Domain-Driven Design (DDD) and Ports and Adapters. It utilizes technologies including PHP, Slim Framework, Doctrine DBAL, Nginx, and Docker.

### What is the Business?
This project simulates an online banking application. To keep it simple, each business entity is considered a root aggregate. While we are not implementing value objects, nothing prevents us from adding them in the future. Instead of using CQRS, we focus on use cases, which include:

#### Use Cases

1. **Customer Registration**
   - **Endpoint:** `POST /customer`
   - **Request Body:**
     ```json
     {
       "name": "Enter your name",
       "phone": "Enter a phone number (no validation)",
       "address": "Enter an address (no validation)"
     }
     ```

2. **Account Registration**
   - **Endpoint:** `POST /account`
   - **Request Body:**
     ```json
     {
       "idCustomer": "104830f5-5503-4fb8-ab28-735d03809c30"
     }
     ```

3. **Withdraw**
   - **Endpoint:** `POST /withdraw`
   - **Request Body:**
     ```json
     {
       "idAccount": "100491a1-f568-476c-9604-ff76334fac4b",
       "amount": 50
     }
     ```

4. **Deposit**
   - **Endpoint:** `POST /deposit`
   - **Request Body:**
     ```json
     {
       "idAccount": "100491a1-f568-476c-9604-ff76334fac4b",
       "amount": 50
     }
     ```

5. **Check Balance**
   - **Endpoint:** `GET /balance/{{uuid}}`

6. **View Statement**
   - **Endpoint:** `GET /statement/{{uuid}}`

7. **Transaction Between Accounts**
   - **Endpoint:** `POST /transaction`
   - **Request Body:**
     ```json
     {
       "accountSender": "94860c46-2498-4af1-8123-2eb6cf52923e",
       "accountReceiver": "100491a1-f568-476c-9604-ff76334fac4b",
       "amount": 15.50
     }
     ```
### Future Improvements 

-  Value Objects
-  Transaction Database
-  Validations
