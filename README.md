# Docker, Ansible and Symfony app
A simple ToDo application that runs in Docker and uses Ansible to automatically deploy to multiple servers.

## Prerequisites
You need to have Docker installed for the application to run, in case you wish to deploy you need to have Ansible as well.

## Getting started

1. Clone the repository
2. Change the mounts/volumes in docker-compose.dev.yml to your needs
3. Run `make dev.up`
4. Open the application over at `http://localhost/`

### Fixtures

Once you have everything up and running you can run `docker exec docker_php_1 bin/console doctrine:fixtures:load -n` to
fill the database with dummy data.

## Deploying

Deploying is easy since we're using Ansible, however this script is only safely usable on Ubuntu. 
You can copy the ansible/testing.dest file to ansible/testing and fill it with the IP addresses you need.
Use the command `ansible-playbook -i ansible/testing ansible/site.yml` and the application will be
deployed to the selected servers.

## Acknowledgements
* This is a small throwaway project, passwords are not encrypted in the docker-compose file and everything's set up
just for a small project
* Ansible's deployment script is very simple and bare bones
* There is no code container, nor is code baked into images, we use local mounts for testing
* The mounts in the development compose file are absolute to make it easier in development on Windows