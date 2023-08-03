from flask import Flask, render_template, request, redirect
from flask_mysqldb import MySQL
from datetime import datetime
import numpy as np
import os
from tensorflow.keras.utils import load_img
from  tensorflow.keras.utils import img_to_array
from keras.models import load_model

#load model
model =load_model(r"C:\xampp\htdocs\Farmagri\farmagri\env\model\cotton.h5")
print('@@Cotton Model loaded')
model1 =load_model(r"C:\xampp\htdocs\Farmagri\farmagri\env\model\potato.h5")
print('@@Potato Model loaded')


def pred_pot_dieas(pot_plant):
  test_image = load_img(pot_plant, target_size = (256, 256)) # load image 
  print("@@ Got Image for prediction")
   
  test_image = img_to_array(test_image)/255 # convert image to np array and normalize
  test_image = np.expand_dims(test_image, axis = 0) # change dimention 3D to 4D
   
  result = model1.predict(test_image).round(3) # predict diseased palnt or not
  print('@@ Raw result = ', result)
   
  pred = np.argmax(result) # get the index of max value
 
  if pred == 0:
    return "Early blight", 'potato.html' # if index 0 burned leaf
  elif pred == 1:
      return 'Late blight', 'potato.html' # # if index 1
  else:
    return "Healthy Cotton Plant", 'potato.html' # if index 3


def pred_cot_dieas(cott_plant):
  test_image = load_img(cott_plant, target_size = (150, 150)) # load image 
  print("@@ Got Image for prediction")
   
  test_image = img_to_array(test_image)/255 # convert image to np array and normalize
  test_image = np.expand_dims(test_image, axis = 0) # change dimention 3D to 4D
   
  result = model.predict(test_image).round(3) # predict diseased palnt or not
  print('@@ Raw result = ', result)
   
  pred = np.argmax(result) # get the index of max value
 
  if pred == 0:
    return "bacterial blight", 'cotton.html' # if index 0 burned leaf
  elif pred == 1:
      return 'curl virus', 'cotton.html' # # if index 1
  elif pred == 2:
      return 'fussarium wilt', 'cotton.html'  # if index 2  fresh leaf
  else:
    return "Healthy Cotton Plant", 'cotton.html' # if index 3


app = Flask(__name__)

# configure database connection
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = ''
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'farmagri.main'

mysql = MySQL(app)

# define route for the HTML form
@app.route('/<string:id>-<string:name>')
def index(id,name):
    return render_template('index.html' ,id=id,name=name)

# define route for form submission
@app.route('/submit', methods=['POST'])
def submit():
    # get form data
    name = request.form['name']
    plant = request.form['plant']
    id = request.form['Lid']
    image = request.files['image']
    date = datetime.now()
    image_path = 'static/user_uploaded/' + image.filename
    # save image to file system
    image.save(image_path)

    print("@@ Predicting class......")
    if plant == 'Cotton':
        pred, output_page = pred_cot_dieas(cott_plant=image_path)
    else:
        pred, output_page = pred_pot_dieas(pot_plant=image_path)
               
    # insert data into database
    cur = mysql.connection.cursor()
    cur.execute('INSERT INTO detect (Lid,name,plant,image,result,date) VALUES (%s, %s, %s,%s, %s, %s)', (id,name,plant, image_path, pred,date))
    mysql.connection.commit()
    cur.close()
    img = 'user_uploaded/'+image.filename
    # redirect to success page
    return render_template(output_page, pred_output = pred, user_image = img ,id=id,name=name)

# define route for success page
@app.route('/success')
def success():
    return 'Data submitted successfully!'

if __name__ == '__main__':
    app.run(debug=True)
