import 'dart:ui';

import 'package:flutter/material.dart';

void main() {
  runApp(
    MyApp()
  );
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
    home: Scaffold(
      backgroundColor: Colors.teal,
      body: SafeArea(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children:<Widget> [
            CircleAvatar(
              radius: 50,
              backgroundImage: AssetImage('images/karan.jpeg'),
            ),
            Text(
              'Karan',
                  style: TextStyle(
                    fontFamily: 'Pacifico',
                    fontSize: 30.0,
                    color: Colors.white,
                    fontWeight: FontWeight.bold,
                  )
            ),
            Text(
              'D.O.B- 16.11.2000',
              style: TextStyle(
                fontFamily: 'SourceSansPro',
                color: Colors.teal[100],
                fontSize: 20.0,
                fontWeight: FontWeight.bold,
              ),
            ),
            SizedBox(height: 20.0,width: 150.0,
              child: Divider(
                color: Colors.teal.shade100,
              ),

            ),
            Card(

              color: Colors.white,
              margin: EdgeInsets.symmetric(vertical: 10.0,horizontal: 25.0),
              child: Padding(
                padding: EdgeInsets.all(15.0),
                child: Row(
                  children: [
                    Icon(
                      Icons.phone,
                      color: Colors.teal,
                    ),
                    SizedBox(
                      width: 10.0,
                    ),
                    Text('+91-7087081045',
                      style: TextStyle(
                      color: Colors.teal,
                      fontSize: 20.0,
                    )
                    ),
                  ],
                ),
              ),
            ),
            Card(

              color: Colors.white,
              margin: EdgeInsets.symmetric(vertical: 10.0,horizontal: 25.0),
              child: Padding(
                padding: EdgeInsets.all(15.0),
                child: Row(
                  children: [
                    Icon(
                      Icons.email,
                      color: Colors.teal,
                    ),
                    SizedBox(
                      width: 10.0,
                    ),
                    Text('Medical Id-####',
                        style: TextStyle(
                          color: Colors.teal,
                          fontSize: 20.0,
                        )
                    ),
                  ],
                ),
              ),
            ),
            Card(

              color: Colors.white,
              margin: EdgeInsets.symmetric(vertical: 10.0,horizontal: 25.0),
              child: Padding(
                padding: EdgeInsets.all(15.0),
                child: Row(
                  children: [
                    Icon(
                      Icons.help,
                      color: Colors.teal,
                    ),
                    SizedBox(
                      width: 10.0,
                    ),
                    Text('Medical History',
                        style: TextStyle(
                          color: Colors.teal,
                          fontSize: 20.0,
                        )
                    ),
                  ],
                ),
              ),
            ),
            Card(

              color: Colors.white,
              margin: EdgeInsets.symmetric(vertical: 10.0,horizontal: 25.0),
              child: Padding(
                padding: EdgeInsets.all(15.0),
                child: Row(
                  children: [
                    Icon(
                      Icons.mood,
                      color: Colors.teal,
                    ),
                    SizedBox(
                      width: 10.0,
                    ),
                    Text('Medical Insurance',
                        style: TextStyle(
                          color: Colors.teal,
                          fontSize: 20.0,
                        )
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      )
      ),
    );
  }
}
