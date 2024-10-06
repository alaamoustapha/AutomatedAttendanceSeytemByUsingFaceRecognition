#detect multiface in live vedio
import cv2
import os
import sys
facedetect=cv2.CascadeClassifier('haarcascade_frontalface_default.xml');
cam=cv2.VideoCapture(0);
OUTPUT_IMG_SIZE=200
id=sys.argv[1]
if os.path.exists("image_database/"+id):
    print(" student exist , plz choose another id ")
    
else:
    
    sampleNum=0;
    os.getcwd()
    os.mkdir("image_database/"+id)
    while(True):

       
       ret,img=cam.read();
       gray=cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
       faces=facedetect.detectMultiScale(gray,1.3,5);
       for(x,y,w,h)in faces:
           sampleNum=sampleNum+1;
           img = cv2.resize(img, (OUTPUT_IMG_SIZE, OUTPUT_IMG_SIZE), interpolation = cv2.INTER_AREA)
           
           cv2.imwrite("image_database/"+str(id)+'/'+"user_"+str(id)+"_"+str(sampleNum)+".png",gray[y:y+h,x:x+w])
           cv2.rectangle(img,(x,y),(x+w,y+h),(0,255,0),2)
           cv2.waitKey(100);
       if (sampleNum>20):
           break;
    
    
cam.release()
cv2.destroyAllWindows()
