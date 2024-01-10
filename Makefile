s:
	./vendor/bin/sail up

shell:
	docker exec -it big-five-inventory-laravel.test-1 bash -l

shell-db:
	docker exec -it big-five-inventory-mysql-1 bash -l

zip:
	chmod +x zip.sh && ./zip.sh

zip-with-vendor:
	chmod +x zip.sh && ./zip.sh with_vendor

del-zip:
	rm ./files.zip