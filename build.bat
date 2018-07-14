docker rm -f hueweb
docker build -t wrix/graphed-timestamps .
docker run -d -p 80:80 --name "hueweb" wrix/graphed-timestamps
