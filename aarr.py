#!/usr/bin/python

# Simple face detection example with OpenCV
# Requires Python 3 and OpenCV 3
#make file and folfer for every taken image
import cv2
import sys
import uuid
import os
n=sys.argv[1]
os.getcwd()
sub=["attendance_images/"+n]
os.mkdir("attendance_images/"+n)
file=open(sub+"/"+n,"a")
file.write("newtest")
file.close()
#os.getcwd()
#os.mkdir(n)
#os.chdir(n)
#os.getcwd()
#os.mkdir(n)
