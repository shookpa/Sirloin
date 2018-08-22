package com.idisanet;

import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.PrintStream;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Properties;

public class Principal2 {
	static String pathDBFRestbar;
	static String pathDBFCopy;

	public Principal2() {
	}

	public static void initialize() {
		Properties prop = new Properties();
		InputStream input = null;

		try {
			input = new FileInputStream("config.properties");
			prop.load(input);

			pathDBFRestbar = prop.getProperty("pathDBFOriginal");
			pathDBFCopy = prop.getProperty("pathDBF");

			System.out.println("La ubicacion del dbf original es: " + pathDBFRestbar);
			System.out.println("La ubicacion del dbf copia es: " + pathDBFCopy);
		} catch (IOException io) {
			io.printStackTrace();

			if (input != null) {
				try {
					input.close();
				} catch (IOException e) {
					e.printStackTrace();
				}
			}
		} finally {
			if (input != null) {
				try {
					input.close();
				} catch (IOException e) {
					e.printStackTrace();
				}
			}
		}
	}

	public static void main(String[] args) {
		initialize();
		Connection connRestbar = null;
		Statement stmtRestbar = null;
		Connection connCopy = null;
		Statement stmtCopy = null;
		try {
			Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
//			Class.forName("com.caigen.sql.dbf.DBFDriver");
			String connStringRestbar = "jdbc:odbc:Driver={Microsoft Visual FoxPro Driver};SourceDB=" + pathDBFRestbar
					+ ";SourceType=DBF";
//			connStringRestbar="jdbc:dbf:"+pathDBFRestbar;
			connRestbar = DriverManager.getConnection(connStringRestbar);
			stmtRestbar = connRestbar.createStatement();
			String connStringCopy = "jdbc:odbc:Driver={Microsoft Visual FoxPro Driver};SourceDB=" + pathDBFCopy
					+ ";SourceType=DBF";
//			connStringCopy="jdbc:dbf:"+pathDBFCopy;
			connCopy = DriverManager.getConnection(connStringCopy);
			stmtCopy = connCopy.createStatement();
			int proceso = Integer.parseInt(args[0]);
			System.out.println("Ejecutando el proceso: "+ proceso);
			DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
			DateFormat dateFormat2 = new SimpleDateFormat("yyyy,M,d");
			DateFormat dateTimeFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
			DateFormat dateTimeFormat2 = new SimpleDateFormat("yyyy,MM,dd,HH,mm,ss");
			String sql;
			ResultSet rsRestbar;
			int cont;
			switch (proceso) {
			case 1:
				System.out.println(
						"---------- Ejecutando el proceso 1 (Envio de las tarjetas actuales a la tabla copia, solo se usa sincronizacion inicial )");
				sql = "SELECT NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP FROM CLI_VIP";
				rsRestbar = stmtRestbar.executeQuery(sql);
				cont = 0;
				while (rsRestbar.next()) {
					String num = rsRestbar.getString("NUM_VIP");
					String nom = rsRestbar.getString("NOM_VIP");
					String tel = rsRestbar.getString("TEL_VIP");
					String ema = rsRestbar.getString("EMA_VIP");
					String fec = rsRestbar.getString("FEC_VIP");
					String sal = rsRestbar.getString("SAL_VIP");
					String fuc = rsRestbar.getString("FUC_VIP");
					String muc = rsRestbar.getString("MUC_VIP");
					String fup = rsRestbar.getString("FUP_VIP");
					String mup = rsRestbar.getString("MUP_VIP");
					String tnr = rsRestbar.getString("TNR_VIP");
					String tmr = rsRestbar.getString("TMR_VIP");
					String tct = rsRestbar.getString("TCT_VIP");
					String pto = rsRestbar.getString("PTO_VIP");
					String pva = rsRestbar.getString("PVA_VIP");
					String Num_vip = num != null ? "'" + num + "'" : "0";
					String Nom_vip = nom != null ? "'" + nom + "'" : "''";
					String Tel_vip = tel != null ? "'" + tel + "'" : "''";
					String Ema_vip = ema != null ? "'" + ema + "'" : "''";					
					String Fec_vip = (fec != null) && (!fec.equalsIgnoreCase("1899-12-30"))
							&& (!fec.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fec)) + ")"
//							&& (!fec.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fec)) + "}"
									: "{//}";
					 
					String Sal_vip = sal != null ? sal : "0";
					String Fuc_vip = (fuc != null) && (!fuc.equalsIgnoreCase("1899-12-30"))
							&& (!fuc.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fuc)) + ")"
//							&& (!fuc.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fuc)) + "}"
									: "{//}";
					String Muc_vip = muc != null ? muc : "0";
					String Fup_vip = (fup != null) && (!fup.equalsIgnoreCase("1899-12-30"))
							&& (!fup.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fup)) + ")"
//							&& (!fup.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fup)) + "}"
									: "{//}";
					String Mup_vip = mup != null ? mup : "0";
					String Tnr_vip = tnr != null ? tnr : "0";
					String Tmr_vip = tmr != null ? tmr : "0";
					String Tct_vip = tct != null ? tct : "0";
					String Pto_vip = pto != null ? pto : "0";
					String Pva_vip = pva != null ? pva : "0";
					String sqlBusq = "SELECT * FROM CLI_VIP WHERE NUM_VIP = " + Num_vip;
					//(NUM_VIP,NOM_VIP,TEL_VIP, EMA_VIP,FEC_VIP,SAL_VIP,FUC_VIP,MUC_VIP,FUP_VIP,MUP_VIP,TNR_VIP,TMR_VIP,TCT_VIP,PTO_VIP,PVA_VIP)"
					
					String sqlInsert = "INSERT INTO CLI_VIP (NUM_VIP,NOM_VIP,TEL_VIP, EMA_VIP,FEC_VIP,SAL_VIP,FUC_VIP,MUC_VIP,FUP_VIP,MUP_VIP,TNR_VIP,TMR_VIP,TCT_VIP,PTO_VIP,PVA_VIP) VALUES (" + Num_vip + "," + Nom_vip + "," + Tel_vip + ","
							+ Ema_vip + "," + Fec_vip + "," + Sal_vip + "," + Fuc_vip + "," + Muc_vip + "," + Fup_vip
							+ "," + Mup_vip + "," + Tnr_vip + "," + Tmr_vip + "," + Tct_vip + "," + Pto_vip + ","
							+ Pva_vip + ");";
					String sqlUpdate = "UPDATE CLI_VIP SET NOM_VIP=" + Nom_vip + ",TEL_VIP=" + Tel_vip + ",EMA_VIP="
							+ Ema_vip + ",FEC_VIP= " + Fec_vip + ",SAL_VIP=" + Sal_vip + ",FUC_VIP=" + Fuc_vip
							+ ",MUC_VIP=" + Muc_vip + ",FUP_VIP=" + Fup_vip + ",MUP_VIP=" + Mup_vip + ",TNR_VIP="
							+ Tnr_vip + ",TMR_VIP=" + Tmr_vip + ",TCT_VIP=" + Tct_vip + ",PTO_VIP=" + Pto_vip
							+ ",PVA_VIP=" + Pva_vip + " WHERE NUM_VIP = " + Num_vip;

					ResultSet rsCopy2 = stmtCopy.executeQuery(sqlBusq);
					boolean hayRegs = false;
					while (rsCopy2.next()) {
						hayRegs = true;
					}
					if (!hayRegs) {
						System.out.println(sqlInsert);
						stmtCopy.execute(sqlInsert);
					} else
						stmtCopy.execute(sqlUpdate);
					cont++;
				}
				System.out.println("-----------Se sincronizaron " + cont
						+ " tarjetas, de la tabla original a la tabla espejo ---------");
				System.out.println(
						"---------- Continuacion del proceso 1 (Envio de los movimientos actuales a la tabla copia, solo se usa sincronizacion inicial )");
				//Si no hay registros, hay que subir todos los registros de la tabla original
				sql = "SELECT NUM_VIP, NOM_VIP, DOC_VIP, FEC_VIP, MON_VIP, CAJ_VIP, DET_VIP, PTO_VIP FROM MOV_VIP";
				rsRestbar = stmtRestbar.executeQuery(sql);
				while (rsRestbar.next()) {
					String num = rsRestbar.getString("NUM_VIP");
					String nom = rsRestbar.getString("NOM_VIP");
					String doc = rsRestbar.getString("DOC_VIP");						
					String fec = rsRestbar.getString("FEC_VIP");
					String mon = rsRestbar.getString("MON_VIP");
					String caj = rsRestbar.getString("CAJ_VIP");
					String det = rsRestbar.getString("DET_VIP");
					String pto = rsRestbar.getString("PTO_VIP");
					
					String num_vip = num != null ? "'" + num + "'" : "0";
					String nom_vip = nom != null ? "'" + nom + "'" : "''";
					String doc_vip = doc != null ? "'" + doc + "'" : "''";
					String fec_vip = (fec != null) && (!fec.equalsIgnoreCase("1899-12-30"))
							&& (!fec.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fec)) + ")"
//							&& (!fec.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fec)) + "}"
									: "{//}";
					String mon_vip = mon != null ?  mon : "0";
					String caj_vip = caj != null ? "'" + caj + "'" : "''";
					String det_vip = det != null ? "'" + det + "'" : "''";
					String pto_vip = pto != null ?  pto : "0";
					String sqlInsert = "INSERT INTO MOV_VIP VALUES(" + num_vip + "," + nom_vip + "," + doc_vip + ","
							+ fec_vip + "," + mon_vip + "," + caj_vip + "," +  det_vip + "," + pto_vip + ");";
					System.out.println(sqlInsert);
					stmtCopy.execute(sqlInsert);
				}
				break;

			case 2:
				System.out.println(
						"---------- Ejecutando el proceso 2 (Envio de los registros de cada dia de la tabla original a la tabla espejo)  ---------");
				sql = "SELECT NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP FROM CLI_VIP  WHERE fec_vip = DATE() OR fuc_vip = DATE() OR fup_vip = DATE() ";
				rsRestbar = stmtRestbar.executeQuery(sql);
				cont = 0;
				while (rsRestbar.next()) {
					String num = rsRestbar.getString("NUM_VIP");
					String nom = rsRestbar.getString("NOM_VIP");
					String tel = rsRestbar.getString("TEL_VIP");
					String ema = rsRestbar.getString("EMA_VIP");
					String fec = rsRestbar.getString("FEC_VIP");
					String sal = rsRestbar.getString("SAL_VIP");
					String fuc = rsRestbar.getString("FUC_VIP");
					String muc = rsRestbar.getString("MUC_VIP");
					String fup = rsRestbar.getString("FUP_VIP");
					String mup = rsRestbar.getString("MUP_VIP");
					String tnr = rsRestbar.getString("TNR_VIP");
					String tmr = rsRestbar.getString("TMR_VIP");
					String tct = rsRestbar.getString("TCT_VIP");
					String pto = rsRestbar.getString("PTO_VIP");
					String pva = rsRestbar.getString("PVA_VIP");
					String Num_vip = num != null ? "'" + num + "'" : "0";
					String Nom_vip = nom != null ? "'" + nom + "'" : "''";
					String Tel_vip = tel != null ? "'" + tel + "'" : "''";
					String Ema_vip = ema != null ? "'" + ema + "'" : "''";
					String Fec_vip = (fec != null) && (!fec.equalsIgnoreCase("1899-12-30"))
							&& (!fec.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fec)) + ")"
//							&& (!fec.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fec)) + "}"
									: "{//}";
					String Sal_vip = sal != null ? sal : "0";
					String Fuc_vip = (fuc != null) && (!fuc.equalsIgnoreCase("1899-12-30"))
							&& (!fuc.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fuc)) + ")"
//							&& (!fuc.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fuc)) + "}"
									: "{//}";
					String Muc_vip = muc != null ? muc : "0";
					String Fup_vip = (fup != null) && (!fup.equalsIgnoreCase("1899-12-30"))
							&& (!fup.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fup)) + ")"
//							&& (!fup.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fup)) + "}"
									: "{//}";
					String Mup_vip = mup != null ? mup : "0";
					String Tnr_vip = tnr != null ? tnr : "0";
					String Tmr_vip = tmr != null ? tmr : "0";
					String Tct_vip = tct != null ? tct : "0";
					String Pto_vip = pto != null ? pto : "0";
					String Pva_vip = pva != null ? pva : "0";
					String sqlBusq = "SELECT * FROM CLI_VIP WHERE NUM_VIP = " + Num_vip;
					String sqlInsert = "INSERT INTO CLI_VIP VALUES(" + Num_vip + "," + Nom_vip + "," + Tel_vip + ","
							+ Ema_vip + ", " + Fec_vip + "," + Sal_vip + "," + Fuc_vip + "," + Muc_vip + "," + Fup_vip
							+ "," + Mup_vip + "," + Tnr_vip + "," + Tmr_vip + "," + Tct_vip + "," + Pto_vip + ","
							+ Pva_vip + ");";
					String sqlUpdate = "UPDATE CLI_VIP SET NOM_VIP=" + Nom_vip + ",TEL_VIP=" + Tel_vip + ",EMA_VIP="
							+ Ema_vip + ",FEC_VIP= " + Fec_vip + ",SAL_VIP=" + Sal_vip + ",FUC_VIP=" + Fuc_vip
							+ ",MUC_VIP=" + Muc_vip + ",FUP_VIP=" + Fup_vip + ",MUP_VIP=" + Mup_vip + ",TNR_VIP="
							+ Tnr_vip + ",TMR_VIP=" + Tmr_vip + ",TCT_VIP=" + Tct_vip + ",PTO_VIP=" + Pto_vip
							+ ",PVA_VIP=" + Pva_vip + " WHERE NUM_VIP = " + Num_vip;
					ResultSet rsCopy2 = stmtCopy.executeQuery(sqlBusq);
					boolean hayRegs = false;
					while (rsCopy2.next()) {
						hayRegs = true;
					}
					if (!hayRegs) {
						stmtCopy.execute(sqlInsert);
					} else
						stmtCopy.execute(sqlUpdate);
					cont++;
				}
				System.out.println("-----------Se sincronizaron " + cont
						+ " tarjetas, de la tabla original a la tabla espejo ---------");
				
				/*
				 * COMIENZO DEL REGISTRO DE MOVIMIENTOS A LA TABLA ESPEJO
				 */
				//Si la tabla espejo esta vacia, que mande todos los registros de la tabla original
				ResultSet rsMovCopy = stmtCopy.executeQuery("SELECT * FROM MOV_VIP");
				boolean hayRegsCopia = false;
				while (rsMovCopy.next()) {
					hayRegsCopia = true;
				}
				if (!hayRegsCopia) 
				{	 
				} 
				else
				{ // en el caso de que si haya registros solo hay que subir los registros del ultimo día:
					sql = "SELECT NUM_VIP, NOM_VIP, DOC_VIP, FEC_VIP, MON_VIP, CAJ_VIP, DET_VIP, PTO_VIP FROM MOV_VIP WHERE fec_vip = DATE()";
					rsRestbar = stmtRestbar.executeQuery(sql);
					while (rsRestbar.next()) {
						String num = rsRestbar.getString("NUM_VIP");
						String nom = rsRestbar.getString("NOM_VIP");
						String doc = rsRestbar.getString("DOC_VIP");						
						String fec = rsRestbar.getString("FEC_VIP");
						String mon = rsRestbar.getString("MON_VIP");
						String caj = rsRestbar.getString("CAJ_VIP");
						String det = rsRestbar.getString("DET_VIP");
						String pto = rsRestbar.getString("PTO_VIP");
						
						String num_vip = num != null ? "'" + num + "'" : "0";
						String nom_vip = nom != null ? "'" + nom + "'" : "''";
						String doc_vip = doc != null ? "'" + doc + "'" : "''";
						String fec_vip = (fec != null) && (!fec.equalsIgnoreCase("1899-12-30"))
								&& (!fec.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fec)) + ")"
//								&& (!fec.equalsIgnoreCase("")) ? "{" + dateFormat2.format(dateFormat.parse(fec)) + "}"
										: "{//}";
						String mon_vip = mon != null ? mon : "0";
						String caj_vip = caj != null ? "'" + caj + "'" : "''";
						String det_vip = det != null ? "'" + det + "'" : "''";
						String pto_vip = pto != null ?  pto : "0";
						
						//Hay que verificar si se tiene que hacer insert o no hacer nada
						String sqlBusq = "SELECT * FROM MOV_VIP WHERE NUM_VIP = " + num_vip + " AND DOC_VIP = "+doc_vip ;
						System.out.println(sqlBusq);
						ResultSet rsCopy2 = stmtCopy.executeQuery(sqlBusq);
						boolean hayRegs = false;
						while (rsCopy2.next()) {
							hayRegs = true;
						}
						if (!hayRegs) {
							String sqlInsert = "INSERT INTO MOV_VIP VALUES(" + num_vip + "," + nom_vip + "," + doc_vip + ","
									+ fec_vip + "," + mon_vip + "," + caj_vip + "," +  det_vip + "," + pto_vip + ");";
							stmtCopy.execute(sqlInsert);
							System.out.println(sqlInsert);

						}
						
					}
					
				}
				/*
				 * FIN DEL REGISTRO DE MOVIMIENTOS A LA TABLA ESPEJO
				 */
				
				break;

			case 3:
				System.out.println(
						"---------- Ejecutando el proceso 3 (Sincronizacion entre la tabla espejo a la tabla original, usando el timestamp)");
				sql = "SELECT CLI_VIP.NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP, LAST_UPDATED_TIME FROM CLI_VIP INNER JOIN CLI_VIP_BIT ON CLI_VIP_BIT.NUM_VIP = CLI_VIP.NUM_VIP   ";
				ResultSet rsCopy = stmtCopy.executeQuery(sql);
				cont = 0;
				while (rsCopy.next()) {
					String num = rsCopy.getString("NUM_VIP");
					String nom = rsCopy.getString("NOM_VIP");
					String tel = rsCopy.getString("TEL_VIP");
					String ema = rsCopy.getString("EMA_VIP");
					String fec = rsCopy.getString("FEC_VIP");
					String sal = rsCopy.getString("SAL_VIP");
					String fuc = rsCopy.getString("FUC_VIP");
					String muc = rsCopy.getString("MUC_VIP");
					String fup = rsCopy.getString("FUP_VIP");
					String mup = rsCopy.getString("MUP_VIP");
					String tnr = rsCopy.getString("TNR_VIP");
					String tmr = rsCopy.getString("TMR_VIP");
					String tct = rsCopy.getString("TCT_VIP");
					String pto = rsCopy.getString("PTO_VIP");
					String pva = rsCopy.getString("PVA_VIP");
					String Num_vip = num != null ? "'" + num + "'" : "0";
					String Nom_vip = nom != null ? "'" + nom + "'" : "''";
					String Tel_vip = tel != null ? "'" + tel + "'" : "''";
					String Ema_vip = ema != null ? "'" + ema + "'" : "''";
					String Fec_vip = (fec != null) && (!fec.equalsIgnoreCase("1899-12-30"))
							&& (!fec.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fec)) + ")"
									: "{//}";
					String Sal_vip = sal != null ? sal : "0";
					String Fuc_vip = (fuc != null) && (!fuc.equalsIgnoreCase("1899-12-30"))
							&& (!fuc.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fuc)) + ")"
									: "{//}";
					String Muc_vip = muc != null ? muc : "0";
					String Fup_vip = (fup != null) && (!fup.equalsIgnoreCase("1899-12-30"))
							&& (!fup.equalsIgnoreCase("")) ? "DATE(" + dateFormat2.format(dateFormat.parse(fup)) + ")"
									: "{//}";
					String Mup_vip = mup != null ? mup : "0";
					String Tnr_vip = tnr != null ? tnr : "0";
					String Tmr_vip = tmr != null ? tmr : "0";
					String Tct_vip = tct != null ? tct : "0";
					String Pto_vip = pto != null ? pto : "0";
					String Pva_vip = pva != null ? pva : "0";
					String sqlBusq = "SELECT * FROM CLI_VIP WHERE NUM_VIP = " + Num_vip;
					String sqlInsert = "INSERT INTO CLI_VIP VALUES(" + Num_vip + "," + Nom_vip + "," + Tel_vip + ","
							+ Ema_vip + ", " + Fec_vip + "," + Sal_vip + "," + Fuc_vip + "," + Muc_vip + "," + Fup_vip
							+ "," + Mup_vip + "," + Tnr_vip + "," + Tmr_vip + "," + Tct_vip + "," + Pto_vip + ","
							+ Pva_vip + ");";
					String sqlUpdate = "UPDATE CLI_VIP SET NOM_VIP=" + Nom_vip + ",TEL_VIP=" + Tel_vip + ",EMA_VIP="
							+ Ema_vip + ",FEC_VIP= " + Fec_vip + ",SAL_VIP=" + Sal_vip + ",FUC_VIP=" + Fuc_vip
							+ ",MUC_VIP=" + Muc_vip + ",FUP_VIP=" + Fup_vip + ",MUP_VIP=" + Mup_vip + ",TNR_VIP="
							+ Tnr_vip + ",TMR_VIP=" + Tmr_vip + ",TCT_VIP=" + Tct_vip + ",PTO_VIP=" + Pto_vip
							+ ",PVA_VIP=" + Pva_vip + " WHERE NUM_VIP = " + Num_vip;
					rsRestbar = stmtRestbar.executeQuery(sqlBusq);
					boolean hayRegs = false;
					while (rsRestbar.next()) {
						hayRegs = true;
					}
					if (!hayRegs) {
						stmtRestbar.execute(sqlInsert);
					} else
						stmtRestbar.execute(sqlUpdate);
					cont++;
				}
				System.out.println("-----------Se sincronizaron " + cont
						+ " tarjetas, de la tabla espejo a la tabla original ---------");

				break;
			default:
				System.out.println("El argumento proporcionado es incorrecto");
			}

		} catch (ClassNotFoundException e) {
			e.printStackTrace();

			try {
				stmtRestbar.close();
				connRestbar.close();
				stmtCopy.close();
				connCopy.close();
			} catch (SQLException ex) {
				ex.printStackTrace();
			}
		} catch (SQLException e) {
			e.printStackTrace();

			try {
				stmtRestbar.close();
				connRestbar.close();
				stmtCopy.close();
				connCopy.close();
			} catch (SQLException ex) {
				ex.printStackTrace();
			}
		} catch (ParseException e) {
			e.printStackTrace();

			try {
				stmtRestbar.close();
				connRestbar.close();
				stmtCopy.close();
				connCopy.close();
			} catch (SQLException ex) {
				ex.printStackTrace();
			}
		} finally {
			try {
				stmtRestbar.close();
				connRestbar.close();
				stmtCopy.close();
				connCopy.close();
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} 
		}
	}
}
