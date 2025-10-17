#!make
.ONESHELL:

push-image:
	$(info [+] Make: Pushing to ghcr.io...)
	docker compose --profile php push

build-image:
	$(info [+] Make: Building docker image...)
	docker compose --profile php build

login:
	$(info [+] Make: Logging into docker container...)
	docker compose --profile php run --remove-orphans -it "${PHP_CONTAINER}" /bin/sh

up:
	docker compose --profile php up --remove-orphans -d
