# Participation Control System
![header](https://centrodainteligencia.com.br/mygif/participation.gif)

This repository contains a system designed to demonstrate a person's ownership in a company. The system is divided into two parts: the frontend, developed in Vue.js, and the backend, developed in Slim Framework PHP.

## Functionalities

- View a person's current stake in the company
- Register and delete people.
- API with routes to register, delete and receive information from the database

## Technologies used

<table>
  <tr>
    <td>PHP</td>
    <td>Slim</td>
    <td>Composer</td>
    <td>Vue.js</td>
    <td>MySql</td>
  </tr>
  <tr>
    <td>8.1.10</td>
    <td>1.2^</td>
    <td>2.4.1</td>
    <td>3.2.13</td>
    <td>8.0.30</td>
  </tr>
</table>

- Frontend: Vue.js
- Backend: Slim Framework PHP
- Database: MySQL

# Online viewing

To view the project online, enter the following link -> https://brasilagenda.com.br/front/

# Testing an API in Postman

To facilitate testing the API, we provide a Postman collection file called `API.postman_collection.json` located in the root of the project. Follow the steps below to test API routes in Postman:

1. Download the [API.postman_collection.json](API.postman_collection.json) file from this repository.

2. Open the Postman application.

3. Click the "Import" button in the upper left corner of the Postman application.

4. Select the "Import From File" option and navigate to the location where you saved the `API.postman_collection.json` file.

5. After importing the file, you will see a collection of requests in Postman's left pane.

6. Now you can expand the collection and test the different API routes by sending the corresponding requests.

# Installation and Local Execution

## Backend

Before you begin, make sure you have the following requirements installed in your development environment:

### Prerequisites

- PHP (8.1 or higher)
- Composer (2.4.1)

### Steps for local execution

1. Clone this repository: `git clone https://github.com/ovitindev/fullstack-project`
2. Navigate to the backend folder: `cd backend`
3. Install the project's dependencies using Composer
4. Configure the MySQL database: `look for the file in the Mysql folder to import mysql`
5. Start the backend local server: `php -S localhost:8000 -t public`

The system will be available at `http://localhost:8080`.

## Frontend

After cloning the repository, go to the frontend folder, open the terminal and run the following commands.
Don't forget to configure the `.env` file according to your local server.

### Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

## MySQL

Look for the database.sql file in the root of the project, and import the database

