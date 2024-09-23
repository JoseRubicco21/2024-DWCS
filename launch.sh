#!/bin/bash

docker compose up -d;
firefox localhost:80 &
firefox localhost:8000 &
code ./
