.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t kata-tests .

build-container:
	docker run -dt --name kata-tests -v .:/540/KataTests kata-tests
	docker exec kata-tests composer install

start:
	docker start kata-tests

test: start
	docker exec kata-tests ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it kata-tests /bin/bash

stop:
	docker stop kata-tests

clean: stop
	docker rm kata-tests
	rm -rf vendor
