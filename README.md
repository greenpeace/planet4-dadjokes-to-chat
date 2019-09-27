# Greenpeace Planet4 Backup Docker Container

![Planet4](./planet4.png)

## Introduction

### What is it?
A last joke.

## How to build it

### In circleCI
Any git commit will create a new version of the docker image, tagged with the circleCI build number and "latest".

The docker image that gets build will then be pushed to the docker hub repository: [greenpeaceinternational/planet4-dadjokes-to-chat](https://hub.docker.com/r/greenpeaceinternational/planet4-dadjokes-to-chat)

### Locally
Run `make dev`

## How it works
- All the logic is in the file jokes.php


## Contribute

Please read the [Contribution Guidelines](https://planet4.greenpeace.org/handbook/dev-contribute-to-planet4/) for Planet4.
