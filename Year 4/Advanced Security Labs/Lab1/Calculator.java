package Calculator;

import java.awt.*;
import java.awt.event.*;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.LineBorder;

public class Calculator extends JFrame implements ActionListener
{
	// Variables.
	int i,v1,v2,result;
	TextField screen;
	Button b[]=new Button[10];
    Button add,sub,mul,div,clear,mod,EQ,AC;
	GridLayout gl;
    char OP, ch;
    String str;
	Boolean CalculationDone = false;
	JPanel p1, p2;
	
	// Method that sets up the GUI layout
	public Calculator(String title)
	{
		super(title);
		setSize(600,485);
		setLayout(null); //Set the layout to null so I can position each component manually using ".setBounds".
		
		//Creating the first Panel which will hold the TextField or 'screen'.
		p2 = new JPanel();
		p2.setBorder(new LineBorder(Color.BLUE, 3)); //Border around panel for cosmetic effect.
		p2.setBackground(Color.WHITE); //Setting the colour of the panel.
		p2.setBounds(0, 0, 585, 70); //Use ".setBounds(X, Y, Width, Height)" to position the panel where you want it in the application.
		screen=new TextField(10);
		screen.setText("");
		screen.setFont(new Font("SansSerif", Font.BOLD, 34));
		screen.setBounds(5, 10, 575, 50);
		//screen.setEditable(false);
		add(screen);
		add(p2); //Adds the panel to the screen.
		
		screen.addActionListener(this);
		gl=new GridLayout(6,3);
		p1 = new JPanel();
		p1.setBorder(new LineBorder(Color.BLUE, 3)); //Border around panel for cosmetic effect.
		p1.setBackground(Color.WHITE); //Setting the colour of the panel.
		p1.setBounds(0, 69, 585, 378); //Use ".setBounds(X, Y, Width, Height)" to position the panel where you want it in the application.
		p1.setLayout(gl);
		
		// Adding required buttons to the panel.
		for(i=0;i<10;i++)
		{
			p1.add(b[i]=new Button(""+i));
		}
		p1.add(add=new Button("+"));
		p1.add(sub=new Button("-"));
		p1.add(mul=new Button("x"));
		p1.add(div=new Button("÷"));
		p1.add(mod=new Button("%"));
		p1.add(clear=new Button("Clear"));
		p1.add(AC=new Button("AC"));
		p1.add(EQ=new Button("="));
		
		// Add action listener to each button
		for(int i=0;i<10;i++)
		{
			b[i].addActionListener(this);
		}
		add.addActionListener(this);
		sub.addActionListener(this);
		mul.addActionListener(this);
		div.addActionListener(this);
		mod.addActionListener(this);
		clear.addActionListener(this);
		EQ.addActionListener(this);
		AC.addActionListener(this);

		add(p1);
		setVisible(true);
	}
 
	public void actionPerformed(ActionEvent event)
	{
		str= event.getActionCommand();
		ch=str.charAt(0);
		
		if ( Character.isDigit(ch))
		{
			if (CalculationDone)
			{
				screen.setText("");
				ClearAll();
				CalculationDone = false;
			}
			screen.setText(screen.getText()+str);
		}
		else if(str.equals("="))
		{
			v2=Integer.parseInt(screen.getText());
			switch(OP) 
			{
				case '+':
					result = v1 + v2;
					break;
				case '-':
					result = v1 - v2;
					break;
				case 'x':
					result = v1 * v2;
					break;
				case '/':
					result = v1 / v2;
					break;
				case '%':
					result = v1 % v2;
					break;
				default:
					break;
			}
			
			screen.setText(""+result);
			CalculationDone = true;
			ClearAll();
		}
		else if(str.equals("clear"))
		{
			screen.setText("");
		}
		else if(str.equals("AC"))
		{
			//Clear everything.
			ClearAll();
		}
		else
		{
			//Find and set the operator, then clear the screen.
			v1=Integer.parseInt(screen.getText());
			OP= str.charAt(0);
			screen.setText("");
		}
	}
	
	public void ClearAll()
	{
		v1 = 0;
		v2 = 0;
		result = 0;
	}
}
