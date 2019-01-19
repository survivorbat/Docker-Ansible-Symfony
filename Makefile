dev.up:
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml up -d
dev.down:
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml down
dev.build:
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml build
dev.restart:
	docker-compose -f docker/docker-compose.yml -f docker/docker-compose.dev.yml restart

prod.up:
	docker-compose -f docker/docker-compose.yml up -d
prod.down:
	docker-compose -f docker/docker-compose.yml down
prod.build:
	docker-compose -f docker/docker-compose.yml build
prod.restart:
	docker-compose -f docker/docker-compose.yml restart