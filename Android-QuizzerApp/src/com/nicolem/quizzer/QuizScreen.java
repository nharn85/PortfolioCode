package com.nicolem.quizzer;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Collections;
import java.util.HashMap;
import java.util.Map;
import java.util.Random;

import android.support.v7.app.ActionBarActivity;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class QuizScreen extends ActionBarActivity {
	TextView tvTerm;
	Button btnOne;
	Button btnTwo;
	Button btnThree;
	Button btnFour;
	
	int score = 0;
	int count = 0;//used to count button clicks and equate to end of defs (not terms as that shrinks)
	String term = "";
	String def = "";
	String correctTerm = "";//get correct term
	String correctDef = "";//save correct def from hash
	String defClicked = "";//to get definition clicked
	ArrayList<String> terms = new ArrayList<String>();
	ArrayList<String> defs = new ArrayList<String>();
	ArrayList<String> defDisplayList = new ArrayList<String>();//defs to display
	Map<String, String> map = new HashMap<String, String>();
	

	@SuppressWarnings("unchecked")
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_quiz_screen);
		
		Bundle extras=getIntent().getExtras();
		if(extras != null)//if bundle has content
		{
			terms = extras.getStringArrayList("termkey");
			defs = extras.getStringArrayList("defkey");
			map = (Map<String, String>) extras.getSerializable("map");
		}//end if
		
		tvTerm = (TextView)findViewById(R.id.tvTerm);
		btnOne = (Button)findViewById(R.id.btnOne);
		btnTwo = (Button)findViewById(R.id.btnTwo);
		btnThree = (Button)findViewById(R.id.btnThree);
		btnFour = (Button)findViewById(R.id.btnFour);

		loadQuestion();
		
		btnOne.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				defClicked = defDisplayList.get(0).toString();
				btnClicked(defClicked);
			}
		});
		
		btnTwo.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				defClicked = defDisplayList.get(1).toString();
				btnClicked(defClicked);
			}
		});
		
		btnThree.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				defClicked = defDisplayList.get(2).toString();
				btnClicked(defClicked);
			}
		});
		
		btnFour.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				defClicked = defDisplayList.get(3).toString();
				btnClicked(defClicked);
			}
		});

	}//end onCreate

	@Override
	public void onBackPressed(){
		Intent i = new Intent(QuizScreen.this,SplashScreen.class);//create intent object
		startActivity(i);
	}//end onBackPressed
	
	//a button was clicked
	private void btnClicked(String defClicked) {
		ifCorrect(defClicked);
		if(count == defs.size()){
			sendName();//if we have completed all questions send name and load last activity
		} else {
			loadQuestion();//else load a new question
		}
	}//end btnClicked

	private void loadQuestion() {
		
		if(defDisplayList.size() != 0){//clear the display def list so we dont over write old defs
			defDisplayList.clear();
		}
		
		//shuffle terms - use first
		Collections.shuffle(terms);//shuffle terms so not in original order
		tvTerm.setText(terms.get(generateNum(0,terms.size()))); //get a random term from list
				
		//get which term was picked
		correctTerm = tvTerm.getText().toString();
		//get corresponding def
		correctDef = map.get(correctTerm).toString();
			
		//remove chosen term from list
		terms.remove(correctTerm);
		
		//shuffle to the same defs arent used in simiar order
		Collections.shuffle(defs);
				
		//add correct def to displayList
		defDisplayList.add(0, correctDef);
				
		//fill list but skip already added def
		for(int i=1; i<=3; i++){
				defDisplayList.add(i, defs.get(i));//add def to list
					
				if(defDisplayList.get(i).equals(correctDef)){//if the one added equals the correct one
					defDisplayList.remove(i);//remove it
					Collections.shuffle(defs);//shuffle the defs
					defDisplayList.add(i, defs.get(0));//add thet first in newly shuffled list
				}//end if
			}//end for
				
			//shuffle display list
			Collections.shuffle(defDisplayList); //shuffle display list
			
			btnOne.setText(defDisplayList.get(0));//display displayDefsList
			btnTwo.setText(defDisplayList.get(1));
			btnThree.setText(defDisplayList.get(2));
			btnFour.setText(defDisplayList.get(3));
		
	}//end loadQuestion

	//used to get random term
	private int generateNum(int number, int max) {
	    Random random = new Random();
	    int generated = random.nextInt(max - number);
	    return generated+number;
	}//end generateNumber
	
	//used to check if button clicked was correct match
	private void ifCorrect(String btnClicked) {
		if(correctDef.equals(btnClicked)){
			score++;
			count++;
			int duration = Toast.LENGTH_SHORT;//set up the timing
			Context context = getApplicationContext();
			Toast toast = Toast.makeText(context, "Correct!", duration);//create Toast obj
			toast.getView().setBackgroundColor(Color.rgb(1,198,51));
			toast.show();//call method of toast obj to display toast
		} else {
			count++;
			int duration = Toast.LENGTH_SHORT;//set up the timing
			Context context = getApplicationContext();
			Toast toast = Toast.makeText(context, "Incorrect.", duration);//create Toast obj
			toast.getView().setBackgroundColor(Color.RED);
			toast.show();//call method of toast obj to display toast
		}
		
	}//end ifCorrect
	
	//used to send name to final screen
	protected void sendName() {
		String name = null;
		Bundle extras = getIntent().getExtras();
		if(extras != null)//if bundle has content
		{
			name = extras.getString("namekey");
		} 
		
		Intent i = new Intent(QuizScreen.this,FinalScreen.class);//create intent object
		extras = new Bundle();//create bundle object
		extras.putString("namekey", name);//fill bundle - sending name value
		extras.putInt("scorekey", score);
		extras.putInt("outOfKey", defs.size());
		i.putExtras(extras);
		startActivity(i);
	}//end sendName	
	
	
}
