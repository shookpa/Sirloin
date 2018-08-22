package com.realtoscana.WS_SirloinClients.impl;

import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.math.BigDecimal;
import java.math.BigInteger;
import java.net.MalformedURLException;
import java.net.URL;
import java.rmi.RemoteException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Properties;

import javax.xml.rpc.holders.BooleanHolder;
import javax.xml.rpc.holders.StringHolder;

import org.apache.axis.AxisFault;

import com.realtoscana.WS_SirloinClients.AccountWS;
import com.realtoscana.WS_SirloinClients.ClientesVip;
import com.realtoscana.WS_SirloinClients.MovimientosVip;
import com.realtoscana.WS_SirloinClients.WS_SirloinClientsBindingStub;

public class Principal {
	static String urlService;
	static String pathDBF;
	static String userService;
	static String pwdService;
	static AccountWS cuenta= new AccountWS();
	
	/*
	 * Este metodo obtendra los valores de las propiedades que requiere el
	 * componente
	 */
	public static void initialize() {
		Properties prop = new Properties();
		InputStream input = null;

		try {

			input = new FileInputStream("config.properties");
			prop.load(input);

			// Obtenemos los valores y los guardamos en nuestras variables.
			urlService = prop.getProperty("urlService");
			pathDBF = prop.getProperty("pathDBF");
			userService = prop.getProperty("userService");
			pwdService = prop.getProperty("pwdService");			
			cuenta.setUsuario(userService);
			cuenta.setPassword(pwdService);
			
			System.out.println("La url del servicio web es: " + urlService);
			System.out.println("La ubicacion del dbf es: " + pathDBF);

		} catch (IOException io) {
			io.printStackTrace();
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
		// TODO Auto-generated method stub
		// Primero vamos a obtener las propiedades
		initialize();
 
		try {
			//Las rutinas iniciales
			
//			Properties props = new Properties();
//			props.setProperty("delayedClose", "0");
//			Class.forName("com.caigen.sql.dbf.DBFDriver");
            Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
			String connString="jdbc:odbc:Driver={Microsoft dBASE Driver (*.dbf)};DefaultDir="+pathDBF;	
			
		    connString="jdbc:odbc:Driver={Microsoft Visual FoxPro Driver};SourceDB="+pathDBF+";SourceType=DBF";//DeafultDir indicates the location of the db

//			Connection conn = DriverManager.getConnection(pathDBF, props);
			Connection conn = DriverManager.getConnection(connString);
//			Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE, ResultSet.CONCUR_UPDATABLE);
			
			Statement stmt = conn.createStatement();
			int proceso = Integer.parseInt(args[0]);
			WS_SirloinClientsBindingStub ws= null;
			try {
				ws = new WS_SirloinClientsBindingStub(new URL(urlService), null);
			} catch (Exception e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			ResultSet rs;
			ResultSet rs2;
			String sql;
			int cont;
			int contador;
			Date date = new Date();
			DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");		
			DateFormat dateFormat2 = new SimpleDateFormat("yyyy,MM,dd");		
			DateFormat dateTimeFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
//			dateTimeFormat = new SimpleDateFormat("dd/MM/yyyy");
			DateFormat dateTimeFormat2 = new SimpleDateFormat("yyyy,MM,dd,HH,mm,ss");
//			dateTimeFormat2 = new SimpleDateFormat("MM/dd/yyyy");
			switch (proceso) {
			case 1:
				ClientesVip[] clientesdelDia;
				System.out.println("---------- Ejecutando el proceso 1 (Envio de los registros de clientes de cada sucursal.)");
				sql = "SELECT NUM_VIP FROM CLI_VIP WHERE NUM_VIP<>'0000000*' ";
				rs = stmt.executeQuery(sql);
				contador=0;
				while (rs.next()) {
					
					contador++;
				}					
				clientesdelDia =  new ClientesVip[contador];
				cont=0;			
				rs = stmt.executeQuery(sql);	
				while (rs.next()) {
					clientesdelDia[cont] = new ClientesVip();
					String num = rs.getString("NUM_VIP");
//					System.out.println("veamos el num:"+num);
					clientesdelDia[cont].setNum_vip(num!= null && !num.startsWith("0000000") ? BigInteger.valueOf(Long.valueOf(num)) : null  );
					cont++;
				}
				for (ClientesVip clientesVip : clientesdelDia) {
					if (clientesVip.getNum_vip()!=null) {
						String num = clientesVip.getNum_vip().toString();
						String sqlInsert = "INSERT INTO CLI_VIP_BIT VALUES('"+num+"', DATETIME());";
						String sqlBusq="SELECT * FROM CLI_VIP_BIT WHERE NUM_VIP = '"+num+"'";
						String sqlUpdate="UPDATE CLI_VIP_BIT SET LAST_UPDATED_TIME=DATETIME() WHERE NUM_VIP = '"+num+"'";
						rs2 = stmt.executeQuery(sqlBusq);
						boolean hayRegs=false;
						while (rs2.next()) {
							hayRegs=true;
						}						
						if (!hayRegs) //SOLO EN EL CASO DE QUE NO EXISTA EL REGISTRO DEBE DE INSERTAR:							
						{	
//							System.out.println(sqlInsert);
							stmt.execute(sqlInsert);
						}
						else
						{	
//							System.out.println(sqlUpdate);
							stmt.execute(sqlUpdate);
						}
					}
					
				}
				sql = "SELECT CLI_VIP.NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP, LAST_UPDATED_TIME FROM CLI_VIP INNER JOIN CLI_VIP_BIT ON CLI_VIP_BIT.NUM_VIP = CLI_VIP.NUM_VIP WHERE CLI_VIP.NUM_VIP<>'0000000*'";
				rs = stmt.executeQuery(sql);
				contador=0;
				while (rs.next()) {
					contador++;
				}					
				clientesdelDia =  new ClientesVip[contador];
				cont=0;			
				rs = stmt.executeQuery(sql);	
				while (rs.next()) {

					clientesdelDia[cont] = new ClientesVip();
					String num = rs.getString("NUM_VIP");
					String nom = rs.getString("NOM_VIP");
					String tel = rs.getString("TEL_VIP");
					String ema = rs.getString("EMA_VIP");
					String fec = rs.getString("FEC_VIP");
					String sal = rs.getString("SAL_VIP");
					String fuc = rs.getString("FUC_VIP");
					String muc = rs.getString("MUC_VIP");
					String fup = rs.getString("FUP_VIP");
					String mup = rs.getString("MUP_VIP");
					String tnr = rs.getString("TNR_VIP");
					String tmr = rs.getString("TMR_VIP");
					String tct = rs.getString("TCT_VIP");
					String pto = rs.getString("PTO_VIP");
					String pva = rs.getString("PVA_VIP");
					
					String lut = rs.getString("LAST_UPDATED_TIME");
					clientesdelDia[cont].setNum_vip(num!= null ? BigInteger.valueOf(Long.valueOf(num)) : null  );
					clientesdelDia[cont].setNom_vip(nom!=null? nom:null);
					clientesdelDia[cont].setTel_vip(tel!=null? tel:null);
					clientesdelDia[cont].setEma_vip(ema!=null ? ema:null);
					clientesdelDia[cont].setFec_vip(!fec.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fec) : null);
					clientesdelDia[cont].setSal_vip(sal!=null ?BigDecimal.valueOf(Double.parseDouble(sal)) : null);
					clientesdelDia[cont].setFuc_vip(!fuc.equalsIgnoreCase("1899-12-30")  ? dateFormat.parse(fuc): null);
					clientesdelDia[cont].setMuc_vip(muc!=null ?BigDecimal.valueOf(Double.parseDouble(muc)): null);
					clientesdelDia[cont].setFup_vip(!fup.equalsIgnoreCase("1899-12-30")  ? dateFormat.parse(fup): null);
					clientesdelDia[cont].setMup_vip(mup!=null ?BigDecimal.valueOf(Double.parseDouble(mup)):null);
					clientesdelDia[cont].setTnr_vip(tnr!=null ? BigInteger.valueOf(Long.valueOf(tnr)) : null );
					clientesdelDia[cont].setTmr_vip(tmr!=null ? BigDecimal.valueOf(Double.parseDouble(tmr)): null);
					clientesdelDia[cont].setTct_vip(tct!=null ? BigDecimal.valueOf(Double.parseDouble(tct)): null);
					clientesdelDia[cont].setPto_vip(pto!=null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					clientesdelDia[cont].setPva_vip(pva!=null ? BigDecimal.valueOf(Double.parseDouble(pva)) : null);
					clientesdelDia[cont].setDatetime_vip(lut!=null? lut:null);
					System.out.println(clientesdelDia[cont]);
					cont++;					
				}			
				try {
					if (clientesdelDia.length>0)
					{	
						System.out.println("A punto de enviar "+clientesdelDia.length+ " clientes");
						String resp = ws.agregarClientes(cuenta, clientesdelDia);
						System.out.println("La respuesta es:" +resp);
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}		
				
				/*
				 * COMIENZO DEL REGISTRO DE MOVIMIENTOS COMPLETOS DE LA SUCURSAL
				 */
				
				System.out.println("---------- Subiendo todos los movimientos de la sucursal ----------------------------------");
				sql = "SELECT NUM_VIP, DOC_VIP, FEC_VIP, MON_VIP, CAJ_VIP, DET_VIP, PTO_VIP  FROM  MOV_VIP";
				rs = stmt.executeQuery(sql);	
				contador=0;
				while (rs.next()) {
//					System.out.println("Calculando el numero de registros con: " + contador);
					contador++;
				}		
				MovimientosVip[] movimientosSucursal =  new MovimientosVip[contador];
				cont=0;			
				rs = stmt.executeQuery(sql);	
				while (rs.next()) {

					movimientosSucursal[cont] = new MovimientosVip();
					String num = rs.getString("NUM_VIP");
					String doc = rs.getString("DOC_VIP");									
					String fec = rs.getString("FEC_VIP");
					String mon = rs.getString("MON_VIP");
					String caj = rs.getString("CAJ_VIP");
					String det = rs.getString("DET_VIP");					
					String pto = rs.getString("PTO_VIP");
					
					movimientosSucursal[cont].setNum_vip(num!= null ? BigInteger.valueOf(Long.valueOf(num)) : null  );
					movimientosSucursal[cont].setDoc_vip(doc!=null? doc:null);
					movimientosSucursal[cont].setDet_vip(det!=null? det:null); 
					movimientosSucursal[cont].setCaj_vip(caj!=null ? caj:null);
					movimientosSucursal[cont].setFec_vip(!fec.equalsIgnoreCase("1899-12-30")  ? dateFormat.parse(fec) : null);
					movimientosSucursal[cont].setMon_vip(mon!=null ?BigDecimal.valueOf(Double.parseDouble(mon)) : null);					
					movimientosSucursal[cont].setPto_vip(pto!=null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					System.out.println(movimientosSucursal[cont]);
					cont++;					
				}			
				try {
					if (movimientosSucursal.length>0)
					{	
						System.out.println("A punto de enviar "+contador+ " movimientos");
						String resp = ws.agregarMovimientos(cuenta, movimientosSucursal);
						System.out.println("La respuesta es:" +resp);
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}	
				
				break;
			case 2:

				
				ClientesVip[] clientesDelDia;
				try {
					clientesDelDia = ws.listarClientesDelDia(cuenta);
					for (ClientesVip clientesVip : clientesDelDia) {						
						
						String Num_vip = clientesVip.getNum_vip() != null ? "'"+clientesVip.getNum_vip()+"'": "0";
						String Nom_vip = clientesVip.getNom_vip() != null ? "'"+clientesVip.getNom_vip()+"'": "''";
						String Tel_vip = clientesVip.getTel_vip() != null ? "'"+clientesVip.getTel_vip()+"'": "''";
						String Ema_vip = clientesVip.getEma_vip() != null ? "'"+clientesVip.getEma_vip()+"'": "''";
						String Fec_vip = clientesVip.getFec_vip() != null ? "DATE("+dateFormat2.format(clientesVip.getFec_vip())+")": "{//}";
						String Sal_vip = clientesVip.getSal_vip() != null ? ""+clientesVip.getSal_vip()+"": "0";
						String Fuc_vip = clientesVip.getFuc_vip() != null ? "DATE("+dateFormat2.format(clientesVip.getFuc_vip())+")": "{//}";
						String Muc_vip = clientesVip.getMuc_vip() != null ? ""+clientesVip.getMuc_vip()+"": "0";
						String Fup_vip = clientesVip.getFup_vip() != null ? "DATE("+dateFormat2.format(clientesVip.getFup_vip())+")": "{//}";
						String Mup_vip = clientesVip.getMup_vip() != null ? ""+clientesVip.getMup_vip()+"": "0";
						String Tnr_vip = clientesVip.getTnr_vip() != null ? ""+clientesVip.getTnr_vip()+"": "0";
						String Tmr_vip = clientesVip.getTmr_vip() != null ? ""+clientesVip.getTmr_vip()+"": "0";
						String Tct_vip = clientesVip.getTct_vip() != null ? ""+clientesVip.getTct_vip()+"": "0";
						String Pto_vip = clientesVip.getPto_vip() != null ? ""+clientesVip.getPto_vip()+"": "0";
						String Pva_vip = clientesVip.getPva_vip() != null ? ""+clientesVip.getPva_vip()+"": "0";	
						String date_time = clientesVip.getDatetime_vip() != null ? "DATETIME("+dateTimeFormat2.format(dateTimeFormat.parse(clientesVip.getDatetime_vip()))+")": "{//}";
						sql = "INSERT INTO CLI_VIP VALUES("+Num_vip+","+Nom_vip+","+Tel_vip+","+Ema_vip+", "+Fec_vip+","+Sal_vip+","+Fuc_vip+","+Muc_vip+","+Fup_vip+","+Mup_vip+","+Tnr_vip+","+Tmr_vip+","+Tct_vip+","+Pto_vip+","+Pva_vip+");";
						//VERIFICAMOS QUE NO EXISTA ESE REGISTRO:	
						String sqlBusq="SELECT * FROM CLI_VIP WHERE NUM_VIP = "+Num_vip;
						String sqlUpdate="UPDATE CLI_VIP SET NOM_VIP="+Nom_vip+",TEL_VIP="+Tel_vip+",EMA_VIP="+Ema_vip+",FEC_VIP= "+Fec_vip+",SAL_VIP="+Sal_vip+",FUC_VIP="+Fuc_vip+",MUC_VIP="+Muc_vip+",FUP_VIP="+Fup_vip+",MUP_VIP="+Mup_vip+",TNR_VIP="+Tnr_vip+",TMR_VIP="+Tmr_vip+",TCT_VIP="+Tct_vip+",PTO_VIP="+Pto_vip+",PVA_VIP="+Pva_vip+" WHERE NUM_VIP = "+Num_vip;
						rs = stmt.executeQuery(sqlBusq);
						boolean hayRegs=false;
						while (rs.next()) {
							hayRegs=true;
						}						
						if (!hayRegs) //SOLO EN EL CASO DE QUE NO EXISTA EL REGISTRO DEBE DE INSERTAR:							
						{	
							System.out.println(sql);
							stmt.execute(sql);
							//DEBE PONER LA FECHA Y HORA DEL SISTEMA WEB EN LA TABLA DE CLI_VIP_BIT
							String sqlUpdateBit= "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time + " WHERE NUM_VIP = "+Num_vip;
							System.out.println("Actualiza la fecha y hora de la tabla local conforme al web: "+sqlUpdateBit );
							stmt.execute(sqlUpdateBit);
						}
						else
						{			
							rs = stmt.executeQuery(sqlBusq);
							//VERIFICA SI HAY CAMBIO EN EL SALDO:
							if (rs.next())
							{
								//System.out.println("Estamos en la busqueda de saldo, del cliente"+ Num_vip);
								String pto_actual = rs.getString("PTO_VIP");
								
								if (!pto_actual.equalsIgnoreCase(Pto_vip))
								{
									if (Double.parseDouble(pto_actual) !=  Double.parseDouble(Pto_vip))
									{
										System.out.println("Si encontro saldo diferente por lo que va actualizar el cliente, "+ Num_vip+ " CON DOUBLE saldo local: "+ pto_actual+ ", saldo web:"+ Pto_vip);
										stmt.execute(sqlUpdate);
										//DEBE PONER LA FECHA Y HORA DEL SISTEMA WEB EN LA TABLA DE CLI_VIP_BIT
										String sqlUpdateBit= "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time + " WHERE NUM_VIP = "+Num_vip;
										System.out.println("Actualiza la fecha y hora de la tabla local conforme al web: "+sqlUpdateBit );
										stmt.execute(sqlUpdateBit);
									}			
									
									
								}		
							}
						}	
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
//				System.out.println("---------- Ejecutando el proceso 2 (Sincronizar esta sucursal con los valores de este dia.)");
//				sql = "SELECT CLI_VIP.NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP, LAST_UPDATED_TIME FROM CLI_VIP INNER JOIN CLI_VIP_BIT ON CLI_VIP_BIT.NUM_VIP = CLI_VIP.NUM_VIP  WHERE fec_vip = DATE() OR fuc_vip = DATE() OR fup_vip = DATE()";
				System.out.println("---------- Ejecutando el proceso 2 (Sincronizar esta sucursal con los valores de los ultimos 2 dias.)");
				sql = "SELECT CLI_VIP.NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP, LAST_UPDATED_TIME FROM CLI_VIP INNER JOIN CLI_VIP_BIT ON CLI_VIP_BIT.NUM_VIP = CLI_VIP.NUM_VIP  WHERE (DATE() - fec_vip <= 2 AND NOT EMPTY(fec_vip) = .T.   ) OR (DATE() - fuc_vip <=2 AND NOT EMPTY(fuc_vip) = .T.) OR (DATE() - fup_vip <= 2 AND NOT EMPTY(fup_vip) = .T.) ";
				rs = stmt.executeQuery(sql);	
				contador=0;
				while (rs.next()) {
//					System.out.println("Calculando el numero de registros con: " + contador);
					contador++;
				}		
				ClientesVip[] clientesdelDiaSucursal =  new ClientesVip[contador];
				cont=0;			
				rs = stmt.executeQuery(sql);	
				while (rs.next()) {

					clientesdelDiaSucursal[cont] = new ClientesVip();
					String num = rs.getString("NUM_VIP");
					String nom = rs.getString("NOM_VIP");
					String tel = rs.getString("TEL_VIP");
					String ema = rs.getString("EMA_VIP");
					String fec = rs.getString("FEC_VIP");
					String sal = rs.getString("SAL_VIP");
					String fuc = rs.getString("FUC_VIP");
					String muc = rs.getString("MUC_VIP");
					String fup = rs.getString("FUP_VIP");
					String mup = rs.getString("MUP_VIP");
					String tnr = rs.getString("TNR_VIP");
					String tmr = rs.getString("TMR_VIP");
					String tct = rs.getString("TCT_VIP");
					String pto = rs.getString("PTO_VIP");
					String pva = rs.getString("PVA_VIP");
					String lut = rs.getString("LAST_UPDATED_TIME");
					clientesdelDiaSucursal[cont].setNum_vip(num!= null ? BigInteger.valueOf(Long.valueOf(num)) : null  );
					clientesdelDiaSucursal[cont].setNom_vip(nom!=null? nom:null);
					clientesdelDiaSucursal[cont].setTel_vip(tel!=null? tel:null);
					clientesdelDiaSucursal[cont].setEma_vip(ema!=null ? ema:null);
					clientesdelDiaSucursal[cont].setFec_vip(!fec.equalsIgnoreCase("1899-12-30")  ? dateFormat.parse(fec) : null);
					clientesdelDiaSucursal[cont].setSal_vip(sal!=null ?BigDecimal.valueOf(Double.parseDouble(sal)) : null);
					clientesdelDiaSucursal[cont].setFuc_vip(!fuc.equalsIgnoreCase("1899-12-30")  ? dateFormat.parse(fuc): null);
					clientesdelDiaSucursal[cont].setMuc_vip(muc!=null ?BigDecimal.valueOf(Double.parseDouble(muc)): null);
					clientesdelDiaSucursal[cont].setFup_vip(!fup.equalsIgnoreCase("1899-12-30")  ? dateFormat.parse(fup): null);
					clientesdelDiaSucursal[cont].setMup_vip(mup!=null ?BigDecimal.valueOf(Double.parseDouble(mup)):null);
					clientesdelDiaSucursal[cont].setTnr_vip(tnr!=null ? BigInteger.valueOf(Long.valueOf(tnr)) : null );
					clientesdelDiaSucursal[cont].setTmr_vip(tmr!=null ? BigDecimal.valueOf(Double.parseDouble(tmr)): null);
					clientesdelDiaSucursal[cont].setTct_vip(tct!=null ? BigDecimal.valueOf(Double.parseDouble(tct)): null);
					clientesdelDiaSucursal[cont].setPto_vip(pto!=null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					clientesdelDiaSucursal[cont].setPva_vip(pva!=null ? BigDecimal.valueOf(Double.parseDouble(pva)) : null);
					clientesdelDiaSucursal[cont].setDatetime_vip(lut!=null? lut:null);
					cont++;					
				}			
				try {
					if (clientesdelDiaSucursal.length>0)
					{	
						System.out.println("A punto de enviar "+clientesdelDiaSucursal.length+ " clientes");
						String resp = ws.agregarClientes(cuenta, clientesdelDiaSucursal);
						System.out.println("La respuesta es:" +resp);
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}				
				/*
				 * COMIENZO DEL REGISTRO DE MOVIMIENTOS 
				 */
				
				System.out.println("---------- Subiendo los movimientos de los ultimos días ----------------------------------");
				sql = "SELECT NUM_VIP,  DOC_VIP, FEC_VIP, MON_VIP, CAJ_VIP, DET_VIP, PTO_VIP FROM MOV_VIP  WHERE (DATE() - fec_vip <= 5 AND NOT EMPTY(fec_vip) = .T. ) ";
				rs = stmt.executeQuery(sql);	
				contador=0;
				while (rs.next()) {
//					System.out.println("Calculando el numero de registros con: " + contador);
					contador++;
				}		
				MovimientosVip[] movimientosDiaSucursal =  new MovimientosVip[contador];
				cont=0;			
				rs = stmt.executeQuery(sql);	
				while (rs.next()) {

					movimientosDiaSucursal[cont] = new MovimientosVip();
					String num = rs.getString("NUM_VIP");
					String doc = rs.getString("DOC_VIP");									
					String fec = rs.getString("FEC_VIP");
					String mon = rs.getString("MON_VIP");
					String caj = rs.getString("CAJ_VIP");
					String det = rs.getString("DET_VIP");					
					String pto = rs.getString("PTO_VIP");
					
					movimientosDiaSucursal[cont].setNum_vip(num!= null ? BigInteger.valueOf(Long.valueOf(num)) : null  );
					movimientosDiaSucursal[cont].setDoc_vip(doc!=null? doc:null);
					movimientosDiaSucursal[cont].setDet_vip(det!=null? det:null); 
					movimientosDiaSucursal[cont].setCaj_vip(caj!=null ? caj:null);
					movimientosDiaSucursal[cont].setFec_vip(!fec.equalsIgnoreCase("1899-12-30")  ? dateFormat.parse(fec) : null);
					movimientosDiaSucursal[cont].setMon_vip(mon!=null ?BigDecimal.valueOf(Double.parseDouble(mon)) : null);					
					movimientosDiaSucursal[cont].setPto_vip(pto!=null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					
					cont++;					
				}			
				try {
					if (movimientosDiaSucursal.length>0)
					{	
						System.out.println("A punto de enviar "+movimientosDiaSucursal.length+ " movimientos");
						String resp = ws.agregarMovimientos(cuenta, movimientosDiaSucursal);
						System.out.println("La respuesta es:" +resp);
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}	
				
				
				
				/*
				 * FIN DEL REGISTRO DE MOVIMIENTOS 
				 */
				break;
			case 3:
				ClientesVip[] clientesTodos;
				try {
					System.out.println("---------- Ejecutando el proceso 3 (Agregar todos los clientes del repositorio central en esta sucursal.)");
					clientesTodos = ws.listarClientes(cuenta);
					for (ClientesVip clientesVip : clientesTodos) {						
					
						String Num_vip = clientesVip.getNum_vip() != null ? "'"+clientesVip.getNum_vip()+"'": "0";
						String Nom_vip = clientesVip.getNom_vip() != null ? "'"+clientesVip.getNom_vip()+"'": "''";
						String Tel_vip = clientesVip.getTel_vip() != null ? "'"+clientesVip.getTel_vip()+"'": "''";
						String Ema_vip = clientesVip.getEma_vip() != null ? "'"+clientesVip.getEma_vip()+"'": "''";
						String Fec_vip = clientesVip.getFec_vip() != null ? "DATE("+dateFormat2.format(clientesVip.getFec_vip())+")": "{//}";
						String Sal_vip = clientesVip.getSal_vip() != null ? ""+clientesVip.getSal_vip()+"": "0";
						String Fuc_vip = clientesVip.getFuc_vip() != null ? "DATE("+dateFormat2.format(clientesVip.getFuc_vip())+")": "{//}";
						String Muc_vip = clientesVip.getMuc_vip() != null ? ""+clientesVip.getMuc_vip()+"": "0";
						String Fup_vip = clientesVip.getFup_vip() != null ? "DATE("+dateFormat2.format(clientesVip.getFup_vip())+")": "{//}";
						String Mup_vip = clientesVip.getMup_vip() != null ? ""+clientesVip.getMup_vip()+"": "0";
						String Tnr_vip = clientesVip.getTnr_vip() != null ? ""+clientesVip.getTnr_vip()+"": "0";
						String Tmr_vip = clientesVip.getTmr_vip() != null ? ""+clientesVip.getTmr_vip()+"": "0";
						String Tct_vip = clientesVip.getTct_vip() != null ? ""+clientesVip.getTct_vip()+"": "0";
						String Pto_vip = clientesVip.getPto_vip() != null ? ""+clientesVip.getPto_vip()+"": "0";
						String Pva_vip = clientesVip.getPva_vip() != null ? ""+clientesVip.getPva_vip()+"": "0";	
						String date_time = clientesVip.getDatetime_vip() != null ? "DATETIME("+dateTimeFormat2.format(dateTimeFormat.parse(clientesVip.getDatetime_vip()))+")": "{//}";
						sql = "INSERT INTO CLI_VIP VALUES("+Num_vip+","+Nom_vip+","+Tel_vip+","+Ema_vip+", "+Fec_vip+","+Sal_vip+","+Fuc_vip+","+Muc_vip+","+Fup_vip+","+Mup_vip+","+Tnr_vip+","+Tmr_vip+","+Tct_vip+","+Pto_vip+","+Pva_vip+");";
						//VERIFICAMOS QUE NO EXISTA ESE REGISTRO:	
						String sqlBusq="SELECT COUNT(*) AS cuantos FROM CLI_VIP WHERE NUM_VIP = "+Num_vip;
						String sqlUpdate="UPDATE CLI_VIP SET NOM_VIP="+Nom_vip+",TEL_VIP="+Tel_vip+",EMA_VIP="+Ema_vip+",FEC_VIP= "+Fec_vip+",SAL_VIP="+Sal_vip+",FUC_VIP="+Fuc_vip+",MUC_VIP="+Muc_vip+",FUP_VIP="+Fup_vip+",MUP_VIP="+Mup_vip+",TNR_VIP="+Tnr_vip+",TMR_VIP="+Tmr_vip+",TCT_VIP="+Tct_vip+",PTO_VIP="+Pto_vip+",PVA_VIP="+Pva_vip+" WHERE NUM_VIP = "+Num_vip;
						rs = stmt.executeQuery(sqlBusq);
//						rs.last();
						int cuantos=0;
						while (rs.next()) {
							cuantos= rs.getInt("cuantos");
						}

						
//						rs.beforeFirst();
						boolean hayRegs=false;
						if (cuantos>=1) 
						{
//							System.out.println("SI hay registros de: "+Num_vip);
							hayRegs=true;
						}	
						else	
						{
//							System.out.println("NO hay registros de: "+Num_vip);
							hayRegs=false;
						}
						if (!hayRegs) //SOLO EN EL CASO DE QUE NO EXISTA EL REGISTRO DEBE DE INSERTAR:						
						{	
//							System.out.println(sql);
							stmt.execute(sql);
							//DEBE PONER LA FECHA Y HORA DEL SISTEMA WEB EN LA TABLA DE CLI_VIP_BIT
							String sqlUpdateBit= "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time + " WHERE NUM_VIP = "+Num_vip;
							System.out.println("Actualiza la fecha y hora de la tabla local conforme al web: "+sqlUpdateBit );
							stmt.execute(sqlUpdateBit);
						}
						else
						{	
//							System.out.println(sqlUpdate);
							stmt.execute(sqlUpdate);
							//DEBE PONER LA FECHA Y HORA DEL SISTEMA WEB EN LA TABLA DE CLI_VIP_BIT
							String sqlUpdateBit= "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time + " WHERE NUM_VIP = "+Num_vip;
							System.out.println("Actualiza la fecha y hora de la tabla local conforme al web: "+sqlUpdateBit );
							stmt.execute(sqlUpdateBit);
						}	
						
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				break;
			case 4:
				
				
				
				/*
				 * FIN DEL REGISTRO DE MOVIMIENTOS 
				 */
					
				break;
			default:
				System.out.println("El argumento proporcionado es incorrecto");
				break;
			}		
			stmt.close();
			conn.close();
		} catch (ClassNotFoundException | SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (NumberFormatException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
