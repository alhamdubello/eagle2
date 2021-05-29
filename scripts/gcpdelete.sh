#!/bin/bash
echo " "
echo "Please Enter the GCP Instance to delete: "
read instancename
echo " "
echo "OK., Thanks for this. Now see the next step."
echo " "
echo "Please enter the zone for the instance: "
read zone
echo " "
gcloud compute instances update $instancename --no-deletion-protection  
gcloud compute instances delete $instancename
