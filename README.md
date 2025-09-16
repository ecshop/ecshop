# ECSHOP

## docker部署

```shell
podman stop ecshop
podman rm ecshop
podman rmi ecshop:1.0
podman build -t ecshop:1.0 .
podman run --name ecshop -d -p 8001:8000 localhost/ecshop:1.0
```
