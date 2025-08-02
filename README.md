# Service Booking System API - Postman Collection Guide

This README provides instructions on how to test the Service Booking System APIs using the provided Postman collection.

---

## 1. Requirements

-   Install [Postman](https://www.postman.com/downloads/).
-   Ensure your Laravel API project is running locally or on a server (default: http://127.0.0.1:8000).

---

## 2. Import Postman Collection

1. Open Postman.
2. Click **Import** and select the `Service Booking System.postman_collection.json` file.
3. The collection will be imported and available in the sidebar.

---

## 3. Setup Environment Variables

Create a Postman environment and set the following variables:

| Variable   | Description                | Example                          |
| ---------- | -------------------------- | -------------------------------- |
| base_url   | Base URL of the API        | `http://127.0.0.1:8000/api`      |
| auth_token | Bearer token (after login) | `eyJhbGciOiJIUzI1NiIsInR5cCI...` |

> **Tip:** After login, update the `auth_token` variable with the token received in the response.

---

## 4. API Groups and Endpoints

### **Service APIs**

1. **Login** - `POST {{base_url}}/login`
    - Body: `email`, `password`
2. **Register** - `POST {{base_url}}/register`
    - Body: `name`, `email`, `password`
3. **Logout** - `POST {{base_url}}/logout`
    - Requires `auth_token`
4. **List Services** - `GET {{base_url}}/services`
    - Requires `auth_token`
5. **Create Service** - `POST {{base_url}}/services/store`
    - Requires `auth_token`
    - Body: `name`, `description`, `price`
6. **Update Service** - `POST {{base_url}}/services/update/{id}`
    - Requires `auth_token`
    - Body: `name`, `description`, `price`
7. **Delete Service** - `DELETE {{base_url}}/services/delete/{id}`
    - Requires `auth_token`

---

### **Booking APIs**

1. **List Bookings (Customer)** - `GET {{base_url}}/bookings`
    - Requires `auth_token`
2. **Create Booking** - `POST {{base_url}}/bookings/store`
    - Requires `auth_token`
    - Body: `service_id`, `booking_date`

---

### **Admin APIs**

1. **List All Bookings** - `GET {{base_url}}/admin/bookings`
    - Requires `auth_token` (Admin)

---

## 5. Testing Steps

1. Register a new user (if not already registered).
2. Login with user credentials and copy the `token` from the response.
3. Set the `auth_token` in your environment for subsequent requests.
4. Use `GET /services` to view services or `POST /bookings/store` to create a booking.
5. For admin endpoints, login as an admin user and use the admin token.
