#!/bin/bash
#stockcheck bootscript
yum update -y
yum install git -y 
yum install httpd -y
systemctl enable httpd --now
firewall-cmd --add-port=80/tcp --permanent
firewall-cmd --add-port=443/tcp --permanent
firewall-cmd --add-port=22/tcp --permanent
firewall-cmd --reload
