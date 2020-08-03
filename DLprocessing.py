#Classification of Plant Through image processing


#importing for connection of database
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode

#importing packages

from keras.preprocessing.image import ImageDataGenerator
from keras.brigades import Sequential
from keras.layers import Conv2D, MaxPooling2D
from keras.layers import Activation, Dropout, Flatten, Dense #creation of layers
from keras import backend as K              #for understanding rgb and channel
import numpy as np                          #manipulate the arrays
from keras.preprocessing import image
 
#dimentions of our images.
img_width, img_height = 150, 150

train_data_dir = 'train/'
validation_data_dir = 'validation/'
nb_train_samples = 1000
nb_validation_samples = 100
epochs = 50
batch_size = 20

#Prevents mixing of channels and help for verification of the data
if K.image_data_format() == 'channel_first':
	input_shape = (3,img_width, img_height) #3,150,150
else:
	input_shape = (img_width, img_height,3) #150,150,3

train_datagen = ImageDataGenerator(
	rescale=1. /255,
	shear_range=0.2,
	zoom_range=0.2,
	horizontal_flip=True)

#only for rescaling and augmentation configuration only for testing

test_datagen = ImageDataGenerator(rescale=1. /255)

#getting the data and generating dataset


train_generator = train_datagen.flow_from_directory(
	train_data_dir,
	target_size=(img_width, img_height),
	batch_size=batch_size,
	class_mode='binary')

validation_generator = test_datagen.flow_from_directory(
	validation_data_dir,
	target_size=(img_width, img_height),
	batch_size=batch_size,
	class_mode='binary')




#Making of a nural network  for processing

brigade = Sequential()
brigade.add(Conv2D(32, (3,3), input_shape=input_shape))
brigade.add(Activation('relu')) # replaces the negative value in the pixel map with zero
brigade.add(MaxPooling2D(pool_size=(2,2)))

brigade.summary()

brigade.add(Conv2D(32, (3,3)))
brigade.add(Activation('relu'))
brigade.add(MaxPooling2D(pool_size=(2,2)))

brigade.add(Conv2D(64, (3,3)))
brigade.add(Activation('relu'))
brigade.add(MaxPooling2D(pool_size=(2,2)))


brigade.add(Flatten())
brigade.add(Dense(64))  #creating a dense layer with 64 units
brigade.add(Activation('relu'))
brigade.add(Dropout(0.5))
brigade.add(Dense(1))
brigade.add(Activation('sigmoid'))

brigade.summary()

brigade.compile(loss='binary_crossentropy',
		optimizer='rmsprop',
		metrics=['accuracy'])


brigade.fit_generator(
	train_generator,
	steps_per_epoch=nb_train_samples // batch_size,
	epochs=epochs,
	validation_data=validation_generator,
	validation_steps=nb_validation_samples // batch_size)

brigade.save_weights('first_try.h5')

img_pred = image.load_img('crop.jpg', target_size = (150,150))
img_pred = image.img_to_array(img_pred)
img_pred = np.expand_dims(img_pred, axis = 0)


rslt = brigade.predict(img_pred)
print(rslt)	
print(prediction)

try:
    connection = mysql.connector.connect(host='localhost',
                                         database='agriculture',
                                         user='root',
                                         password='')
    sno=int
    mySql_insert_query = ("select prediction from farmerinfo where prediction='prediction'")
    cursor = connection.cursor()
    cursor.execute(mySql_insert_query)
    records = cursor.fetchall()
print("Total number of rows in Laptop is: ", cursor.rowcount)

finally:
    if (connection.is_connected()): 
        connection.close()
