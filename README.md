## About Software Development @ Cyberhawk

## The task
We've designed this task to try and give you the ability to show us what you can do and hopefully flex your technical and creative muscles. You can't show off too much here, show us you at your best and wow us!

To make things as simple as we could, we've opted to use [Laravel Sail](https://laravel.com/docs/8.x/sail) to provide a quick and convenient development environment, this will require you to install
[Docker Desktop](https://www.docker.com/products/docker-desktop) before you can start the test. We've provided [some more detailed instructions](#setting-everything-up) below in case this is your first time using Docker or Sail.

We'd like you to build an application that will display an example wind farm, its turbines and their components.
We'd like to be able to see components and their grades (measurement of damage/wear) ranging between 1 - 5.

For example, a turbine could contain the following components:
- Blade
- Rotor
- Hub
- Generator

Don't worry about using real names for components or accurate looking data, we're more interested in how you structure the application and how you present the data.

Don't be afraid of submitting incomplete code or code that isn't quite doing what you would like, just like your maths teacher, we like to see your working.
Just Document what you had hoped to achieve and your thoughts behind any unfinished code, so that we know what your plan was.

### Requirements
- Display a list of turbine inspections
- Each Turbine should have a number of components
- A component can be given a grade from 1 to 5 (1 being perfect and 5 being completely broken/missing)
- Use Laravel Models to represent the Entities in the task.

### Bonus Points
- Great UX/UI
- Use of React JS
- Use of Tailwind CSS
- Use of 3D
- Use of a web map technology in the display of the data
- Automated tests
- API Authentication
- Use of coding style guidelines (we use PSR-12 and AirBnb)
- Use of git with clear logical commits
- Specs/Plans/Designs

### Submitting The Task
Ideally you will fork this repo, work on it then email us with details of where to access it.
Alternatively you can download locally and email us a zip of your completed work.

## Setting Everything Up
As mentioned above we have chosen to make use of Laravel Sail as the foundation of this technical test.
- If you haven't already, you will need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).
- One that is installed your next step is to install this projects composer dependencies (including Sail).
    - This will require either PHP 8 installed on your local machine or the use of [a small docker container](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects) that runs PHP 8 that can install the dependencies for us.
- If you haven't done so already copy the `.env.example` file to `.env`
    - If you are running a local development environment you may need to change some default ports in the `.env` file
        - We've already changed mysql to 33060 and NGINX to 81 for you
- It should now be time to [start Sail](https://laravel.com/docs/8.x/sail#starting-and-stopping-sail) and the task

### Installing Composer Dependencies
https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects
```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

## Before Starting
Please make sure to migrate and seed the database to set up the rough data:

```bash
php artisan migrate
php artisan db:seed
```

### My Notes
## Specs
- The application manages Turbines with multiple Components.
- Inspector (User) can log in to rate the components of a turbine.
- Ratings are stored with details including:
    - Inspector (User) ID
    - Turbine ID
    - Component ID
    - Rating value (1 to 5)
    - Inspection date and time
- Recent ratings for a component are displayed by default for a turbine.
- Historical rating data is accessible via a dedicated page showing all previous inspections.
- User authentication is implemented for inspectors; 
    - general users can browse turbines and previous inspections without login.

## Plans
- Provide an user friendly interface on the homepage showing all turbines.
- Clicking a turbine leads to the turbine page showing its components and their recent ratings.
- Only logged in inspector can see a Submit Rating button on the turbine page.
- A separate "Previous Inspections" page to show the rating history:
    - Columns: Components
    - Rows: Inspection dates
    - Cells: Ratings submitted for each component on those dates

## Design
- Database:
    - turbines: stores turbine info
    - components: stores components info
    - ratings: stores inspector ratings for the components
    - users: stores inspector info and credentials
- UI/UX:
    - Tailwind CSS for responsive design
    - Rating form with validation (rating between 1 and 5, examination date not in future)
