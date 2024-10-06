
#!C:/Users/laila/AppData/Local/Programs/Python/Python36-32/python.exe
#---------------------------------------------------------------------------

import uuid
import cv2
import glob
import numpy as np
import os
from array import *
import sys

#---------------------------------------------------------------------------
found_id=[]
n=sys.argv[1]
m=sys.argv[2]
s=n+m
imh=cv2.imread(s)
sub="attendance_images/"+m
print(sub)
os.mkdir("attendance_images/"+m)
os.mkdir(sub+"/extract")

nam=m+".txt"

def __get_images_and_labels(files):
        
        images = []
        labels = []
        

        c = 0
        for f in files:
                images.append(__prepare_image(f))
                labels.append(c)
                c = c+1
        
        cv2.destroyAllWindows()
        
        return images, labels 

#---------------------------------------------------------------------------
# Load the image file, convert  to greyscale, normalize brightness and
# return the image
def __prepare_image(filename):
       
        img = cv2.imread(filename)
        img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        img = cv2.equalizeHist(img)
        return img

                
def whoIs(fName):
        file=open(sub+"/"+nam,"a")
        img = __prepare_image(fName)
        

        collector = cv2.face.StandardCollector_create()
        recognizer.predict_collect(img, collector)
        dist = collector.getMinDist()
        nbr_predicted = collector.getMinLabel()
        folder_path = os.path.dirname(faceFiles[nbr_predicted])
        path,folder_name = os.path.split(folder_path)
        found_id.append(folder_name)
        file.write(folder_name)
        file.write("\n")
        file.close()



#recognizer = cv2.face.createFisherFaceRecognizer()
recognizer = cv2.face.createLBPHFaceRecognizer()
#recognizer = cv2.face.createEigenFaceRecognizer()


faceFiles = glob.glob('image_database/*/*.png')

images, labels = __get_images_and_labels(faceFiles)
recognizer.train(images, np.array(labels))



OUTPUT_IMG_SIZE = 200


def getFaces(image):
        

        faceCascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')

        faces = faceCascade.detectMultiScale(
                image,
                scaleFactor=1.2,
                minNeighbors=5,
                minSize=(50, 50)
        )
        sampleNum=0
       
        for (x, y, w, h) in faces:
                img1 = image[y:y+h, x:x+w]
                r = OUTPUT_IMG_SIZE / img1.shape[1]
                img2 = cv2.resize(img1, (OUTPUT_IMG_SIZE, OUTPUT_IMG_SIZE), interpolation = cv2.INTER_AREA)

                fname = str(sampleNum) + ".png"

                cv2.imwrite(sub+"/"+"extract/"+str(sampleNum)+".png", img2)
               
                whoIs(sub+"/extract/"+fname)
                sampleNum=sampleNum+1
        for (x, y, w, h) in faces:
                        cv2.rectangle(image, (x, y), (x+w, y+h), (0, 255, 0), 2)
        cv2.imwrite(sub+"/"+m,image)
        
    

getFaces(imh)

