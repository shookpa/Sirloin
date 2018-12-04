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
import org.apache.log4j.Logger;
import org.apache.log4j.PropertyConfigurator;
import org.apache.commons.lang3.exception.ExceptionUtils;
import com.realtoscana.WS_SirloinClients.AccountWS;
import com.realtoscana.WS_SirloinClients.ClientesVip;
import com.realtoscana.WS_SirloinClients.FacturasVip;
import com.realtoscana.WS_SirloinClients.MovimientosVip;
import com.realtoscana.WS_SirloinClients.WS_SirloinClientsBindingStub;

public class Principal {
	final static Logger log = Logger.getLogger(Principal.class);

	static String urlService;
	static String pathDBF;
	static String userService;
	static String pwdService;
	static AccountWS cuenta = new AccountWS();

	/*
	 * Este metodo obtendra los valores de las propiedades que requiere el
	 * componente
	 */
	public static void initialize() {
		String log4jConfPath = "resources/log4jWeb.properties";
		PropertyConfigurator.configure(log4jConfPath);
		log.info("Inicializando la clase Principal");
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
			
			log.info("La url del servicio web es: " + urlService);
			log.info("La ubicacion del dbf es: " + pathDBF);

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
			// Las rutinas iniciales

			// Properties props = new Properties();
			// props.setProperty("delayedClose", "0");
			// Class.forName("com.caigen.sql.dbf.DBFDriver");
			Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
			String connString = "jdbc:odbc:Driver={Microsoft dBASE Driver (*.dbf)};DefaultDir=" + pathDBF;

			connString = "jdbc:odbc:Driver={Microsoft Visual FoxPro Driver};SourceDB=" + pathDBF + ";SourceType=DBF";// DeafultDir
																														// indicates
																														// the
																														// location
																														// of
																														// the
																														// db

			// Connection conn = DriverManager.getConnection(pathDBF, props);
			Connection conn = DriverManager.getConnection(connString);
			// Statement stmt =
			// conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,
			// ResultSet.CONCUR_UPDATABLE);

			Statement stmt = conn.createStatement();
			int proceso = Integer.parseInt(args[0]);
			WS_SirloinClientsBindingStub ws = null;
			try {
				ws = new WS_SirloinClientsBindingStub(new URL(urlService), null);
			} catch (Exception e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			ResultSet rs;
			ResultSet rs2;
			ResultSet rsBit;
			String sql;
			int cont;
			int contador;
			Date date = new Date();
			DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
			DateFormat dateFormat2 = new SimpleDateFormat("yyyy,MM,dd");
			DateFormat dateTimeFormat = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
			// dateTimeFormat = new SimpleDateFormat("dd/MM/yyyy");
			DateFormat dateTimeFormat2 = new SimpleDateFormat("yyyy,MM,dd,HH,mm,ss");
			// dateTimeFormat2 = new SimpleDateFormat("MM/dd/yyyy");
			switch (proceso) {
			case 1:
				ClientesVip[] clientesdelDia;
				log.info(
						" Ejecutando el proceso 1 (Envio de los registros de clientes de cada sucursal.)");
				sql = "SELECT NUM_VIP FROM CLI_VIP WHERE NUM_VIP<>'0000000*' AND LEN(ALLTRIM(NUM_VIP))=8  ";
				rs = stmt.executeQuery(sql);
				contador = 0;
				while (rs.next()) {

					contador++;
				}
				clientesdelDia = new ClientesVip[contador];
				cont = 0;
				rs = stmt.executeQuery(sql);
				while (rs.next()) {
					clientesdelDia[cont] = new ClientesVip();
					String num = rs.getString("NUM_VIP").trim();
					// log.info("veamos el num:"+num);
					clientesdelDia[cont].setNum_vip(
							num != null && !num.startsWith("0000000") ? BigInteger.valueOf(Long.valueOf(num)) : null);
					cont++;
				}
				for (ClientesVip clientesVip : clientesdelDia) {
					if (clientesVip.getNum_vip() != null) {
						String num = clientesVip.getNum_vip().toString();
						String sqlInsert = "INSERT INTO CLI_VIP_BIT VALUES('" + num + "', DATETIME());";
						String sqlBusq = "SELECT * FROM CLI_VIP_BIT WHERE NUM_VIP = '" + num + "'";
						String sqlUpdate = "UPDATE CLI_VIP_BIT SET LAST_UPDATED_TIME=DATETIME() WHERE NUM_VIP = '" + num
								+ "'";
						rs2 = stmt.executeQuery(sqlBusq);
						boolean hayRegs = false;
						while (rs2.next()) {
							hayRegs = true;
						}
						if (!hayRegs) // SOLO EN EL CASO DE QUE NO EXISTA EL
										// REGISTRO DEBE DE INSERTAR:
						{
							// log.info(sqlInsert);
							stmt.execute(sqlInsert);
						} else {
							// log.info(sqlUpdate);
							stmt.execute(sqlUpdate);
						}
					}

				}
				sql = "SELECT CLI_VIP.NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP, LAST_UPDATED_TIME FROM CLI_VIP INNER JOIN CLI_VIP_BIT ON CLI_VIP_BIT.NUM_VIP = CLI_VIP.NUM_VIP WHERE CLI_VIP.NUM_VIP<>'0000000*' AND LEN(ALLTRIM(CLI_VIP.NUM_VIP))=8 ";
				rs = stmt.executeQuery(sql);
				contador = 0;
				while (rs.next()) {
					contador++;
				}
				clientesdelDia = new ClientesVip[contador];
				cont = 0;
				rs = stmt.executeQuery(sql);
				while (rs.next()) {

					clientesdelDia[cont] = new ClientesVip();
					String num = rs.getString("NUM_VIP").trim();
					String nom = rs.getString("NOM_VIP").trim();
					String tel = rs.getString("TEL_VIP").trim();
					String ema = rs.getString("EMA_VIP").trim();
					String fec = rs.getString("FEC_VIP").trim();
					String sal = rs.getString("SAL_VIP").trim();
					String fuc = rs.getString("FUC_VIP").trim();
					String muc = rs.getString("MUC_VIP").trim();
					String fup = rs.getString("FUP_VIP").trim();
					String mup = rs.getString("MUP_VIP").trim();
					String tnr = rs.getString("TNR_VIP").trim();
					String tmr = rs.getString("TMR_VIP").trim();
					String tct = rs.getString("TCT_VIP").trim();
					String pto = rs.getString("PTO_VIP").trim();
					String pva = rs.getString("PVA_VIP").trim();

					String lut = rs.getString("LAST_UPDATED_TIME").trim();
					clientesdelDia[cont].setNum_vip(num != null ? BigInteger.valueOf(Long.valueOf(num)) : null);
					clientesdelDia[cont].setNom_vip(nom != null ? nom : null);
					clientesdelDia[cont].setTel_vip(tel != null ? tel : null);
					clientesdelDia[cont].setEma_vip(ema != null ? ema : null);
					clientesdelDia[cont].setFec_vip(!fec.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fec) : null);
					clientesdelDia[cont].setSal_vip(sal != null ? BigDecimal.valueOf(Double.parseDouble(sal)) : null);
					clientesdelDia[cont].setFuc_vip(!fuc.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fuc) : null);
					clientesdelDia[cont].setMuc_vip(muc != null ? BigDecimal.valueOf(Double.parseDouble(muc)) : null);
					clientesdelDia[cont].setFup_vip(!fup.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fup) : null);
					clientesdelDia[cont].setMup_vip(mup != null ? BigDecimal.valueOf(Double.parseDouble(mup)) : null);
					clientesdelDia[cont].setTnr_vip(tnr != null ? BigInteger.valueOf(Long.valueOf(tnr)) : null);
					clientesdelDia[cont].setTmr_vip(tmr != null ? BigDecimal.valueOf(Double.parseDouble(tmr)) : null);
					clientesdelDia[cont].setTct_vip(tct != null ? BigDecimal.valueOf(Double.parseDouble(tct)) : null);
					clientesdelDia[cont].setPto_vip(pto != null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					clientesdelDia[cont].setPva_vip(pva != null ? BigDecimal.valueOf(Double.parseDouble(pva)) : null);
					clientesdelDia[cont].setDatetime_vip(lut != null ? lut : null);
//					log.info(clientesdelDia[cont]);
					cont++;
				}
				try {
					if (clientesdelDia.length > 0) {
						ClientesVip[][] cliVip = chunkCliArray(clientesdelDia, 1000);
						for (ClientesVip[] cliVips : cliVip) {
							log.info("A punto de enviar " + cliVips.length + " clientes");
							String resp = ws.agregarClientes(cuenta, cliVips);
							log.info("La respuesta es:" + resp);
						}
//						log.info("A punto de enviar " + clientesdelDia.length + " clientes");
//						String resp = ws.agregarClientes(cuenta, clientesdelDia);
//						log.info("La respuesta es:" + resp);
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				break;
			case 2:
				log.info("--PROC.2-- Ejecutando el proceso 2 (Sincronizar esta sucursal con los valores de los ultimos 2 dias.)");
				ClientesVip[] clientesDelDia;
				try {
					clientesDelDia = ws.listarClientesDelDia(cuenta);
					log.info("--PROC.2-- Consultando el servicio web, encontro: "+clientesDelDia.length+ " tarjetas con modificaciones recientes");
					for (ClientesVip clientesVip : clientesDelDia) {

						String Num_vip = clientesVip.getNum_vip() != null ? "'" + clientesVip.getNum_vip() + "'" : "0";
						String Nom_vip = clientesVip.getNom_vip() != null ? "'" + clientesVip.getNom_vip() + "'" : "''";
						String Tel_vip = clientesVip.getTel_vip() != null ? "'" + clientesVip.getTel_vip() + "'" : "''";
						String Ema_vip = clientesVip.getEma_vip() != null ? "'" + clientesVip.getEma_vip() + "'" : "''";
						String Fec_vip = clientesVip.getFec_vip() != null
								? "DATE(" + dateFormat2.format(clientesVip.getFec_vip()) + ")" : "{//}";
						String Sal_vip = clientesVip.getSal_vip() != null ? "" + clientesVip.getSal_vip() + "" : "0";
						String Fuc_vip = clientesVip.getFuc_vip() != null
								? "DATE(" + dateFormat2.format(clientesVip.getFuc_vip()) + ")" : "{//}";
						String Muc_vip = clientesVip.getMuc_vip() != null ? "" + clientesVip.getMuc_vip() + "" : "0";
						String Fup_vip = clientesVip.getFup_vip() != null
								? "DATE(" + dateFormat2.format(clientesVip.getFup_vip()) + ")" : "{//}";
						String Mup_vip = clientesVip.getMup_vip() != null ? "" + clientesVip.getMup_vip() + "" : "0";
						String Tnr_vip = clientesVip.getTnr_vip() != null ? "" + clientesVip.getTnr_vip() + "" : "0";
						String Tmr_vip = clientesVip.getTmr_vip() != null ? "" + clientesVip.getTmr_vip() + "" : "0";
						String Tct_vip = clientesVip.getTct_vip() != null ? "" + clientesVip.getTct_vip() + "" : "0";
						String Pto_vip = clientesVip.getPto_vip() != null ? "" + clientesVip.getPto_vip() + "" : "0";
						String Pva_vip = clientesVip.getPva_vip() != null ? "" + clientesVip.getPva_vip() + "" : "0";
						Date date_timeWeb= dateTimeFormat.parse(clientesVip.getDatetime_vip());
						String date_time = clientesVip.getDatetime_vip() != null ? "DATETIME("
								+ dateTimeFormat2.format(dateTimeFormat.parse(clientesVip.getDatetime_vip())) + ")"
								: "{//}";
						sql = "INSERT INTO CLI_VIP VALUES(" + Num_vip + "," + Nom_vip + "," + Tel_vip + "," + Ema_vip
								+ ", " + Fec_vip + "," + Sal_vip + "," + Fuc_vip + "," + Muc_vip + "," + Fup_vip + ","
								+ Mup_vip + "," + Tnr_vip + "," + Tmr_vip + "," + Tct_vip + "," + Pto_vip + ","
								+ Pva_vip + ");";
						// VERIFICAMOS QUE NO EXISTA ESE REGISTRO:
						String sqlBusq = "SELECT * FROM CLI_VIP WHERE NUM_VIP = " + Num_vip;
						String sqlUpdate = "UPDATE CLI_VIP SET NOM_VIP=" + Nom_vip + ",TEL_VIP=" + Tel_vip + ",EMA_VIP="
								+ Ema_vip + ",FEC_VIP= " + Fec_vip + ",SAL_VIP=" + Sal_vip + ",FUC_VIP=" + Fuc_vip
								+ ",MUC_VIP=" + Muc_vip + ",FUP_VIP=" + Fup_vip + ",MUP_VIP=" + Mup_vip + ",TNR_VIP="
								+ Tnr_vip + ",TMR_VIP=" + Tmr_vip + ",TCT_VIP=" + Tct_vip + ",PTO_VIP=" + Pto_vip
								+ ",PVA_VIP=" + Pva_vip + " WHERE NUM_VIP = " + Num_vip;
						rs = stmt.executeQuery(sqlBusq);
						log.info("--PROC.2-- Buscando registros en cli_vip espejo del num_vip: "+Num_vip);
						log.info("--PROC.2-- Query busqueda: "+sqlBusq);
						boolean hayRegs = false;
						while (rs.next()) {
							hayRegs = true;
						}
						if (!hayRegs) // SOLO EN EL CASO DE QUE NO EXISTA EL
										// REGISTRO DEBE DE INSERTAR:
						{
							log.info("--PROC.2-- Query insercion:"+sql);
							
							stmt.execute(sql);
							// DEBE PONER LA FECHA Y HORA DEL SISTEMA WEB EN LA
							// TABLA DE CLI_VIP_BIT
							String sqlUpdateBit = "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time
									+ " WHERE NUM_VIP = " + Num_vip;
							log.info("--PROC.2-- Query actualizacion:"+ sqlUpdateBit);
							stmt.execute(sqlUpdateBit);
						} else {
							rs = stmt.executeQuery(sqlBusq);
							// VERIFICA SI HAY CAMBIO EN EL SALDO:
							if (rs.next()) {
								// log.info("Estamos en la busqueda de
								// saldo, del cliente"+ Num_vip);
							
								
								String pto_actual= rs.getString("PTO_VIP").trim();
								String fuc_actual= rs.getString("FUC_VIP").trim();
								String fup_actual= rs.getString("FUP_VIP").trim();

								if (!pto_actual.equalsIgnoreCase(Pto_vip)) {
									if (Double.parseDouble(pto_actual) != Double.parseDouble(Pto_vip)) {
										
										//verificamos que la fecha del web sea superior a la fecha de la tabla local espejo
										String sqlBusqBit = "SELECT last_updated_time FROM CLI_VIP_BIT WHERE NUM_VIP = " + Num_vip;
										rsBit = stmt.executeQuery(sqlBusqBit);
										rsBit.next();
										String  datetimeLocalStr = rsBit.getString("last_updated_time").trim();
										Date datetimeLocal = dateTimeFormat.parse(datetimeLocalStr);
										if (datetimeLocal.after(date_timeWeb))
										{	//En el caso de que en la tabla local haya una hora y fecha mas reciente, que solo imprima los logs:
											log.info(
													"Hubo un movimiento mas reciente en esta sucursal, del cliente "
															+ Num_vip 
															+ ", saldo web:" + Pto_vip
															+ ", saldo local: " + pto_actual
															+ ", FUC web:" + Fuc_vip
															+ ", FUC local:" + fuc_actual
															+ ", FUP web:" + Fup_vip
															+ ", FUP local:" + fup_actual
															+ ", date_timeWeb:" + date_timeWeb
															+ ", datetimeLocal:" + datetimeLocal + ". Por lo tanto, no debe hacer nada");
											
										}
										else
										{
											log.info(
													"Si encontro saldo diferente mas reciente en el web por lo que va actualizar el cliente: "
															+ Num_vip 
															+ ", saldo web:" + Pto_vip
															+ ", saldo local: " + pto_actual
															+ ", FUC web:" + Fuc_vip
															+ ", FUC local:" + fuc_actual
															+ ", FUP web:" + Fup_vip
															+ ", FUP local:" + fup_actual
															+ ", date_timeWeb:" + date_timeWeb
															+ ", datetimeLocal:" + datetimeLocal);
											stmt.execute("--PROC.2-- Query actualizacion:"+sqlUpdate);
											
											
											
											// DEBE PONER LA FECHA Y HORA DEL
											// SISTEMA WEB EN LA TABLA DE
											// CLI_VIP_BIT
											String sqlUpdateBit = "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time
													+ " WHERE NUM_VIP = " + Num_vip;
											log.info("--PROC.2-- Query actualizacion:"+sqlUpdateBit);
											stmt.execute(sqlUpdateBit);
										}
									}

								}
							}
						}
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				
				sql = "SELECT CLI_VIP.NUM_VIP, NOM_VIP, TEL_VIP, EMA_VIP, FEC_VIP, SAL_VIP, FUC_VIP, MUC_VIP, FUP_VIP, MUP_VIP, TNR_VIP, TMR_VIP, TCT_VIP, PTO_VIP, PVA_VIP, LAST_UPDATED_TIME FROM CLI_VIP INNER JOIN CLI_VIP_BIT ON CLI_VIP_BIT.NUM_VIP = CLI_VIP.NUM_VIP  WHERE (DATE() - fec_vip <= 2 AND NOT EMPTY(fec_vip) = .T.   ) OR (DATE() - fuc_vip <=2 AND NOT EMPTY(fuc_vip) = .T.) OR (DATE() - fup_vip <= 2 AND NOT EMPTY(fup_vip) = .T.) AND LEN(ALLTRIM(CLI_VIP.NUM_VIP))=8";
				rs = stmt.executeQuery(sql);
				
				log.info("--PROC.2-- Query extraccion: "+sql);
				contador = 0;
				while (rs.next()) {					
					contador++;
				}
				ClientesVip[] clientesdelDiaSucursal = new ClientesVip[contador];
				cont = 0;
				rs = stmt.executeQuery(sql);
				while (rs.next()) {

					clientesdelDiaSucursal[cont] = new ClientesVip();
					String num = rs.getString("NUM_VIP").trim();
					String nom = rs.getString("NOM_VIP").trim();
					String tel = rs.getString("TEL_VIP").trim();
					String ema = rs.getString("EMA_VIP").trim();
					String fec = rs.getString("FEC_VIP").trim();
					String sal = rs.getString("SAL_VIP").trim();
					String fuc = rs.getString("FUC_VIP").trim();
					String muc = rs.getString("MUC_VIP").trim();
					String fup = rs.getString("FUP_VIP").trim();
					String mup = rs.getString("MUP_VIP").trim();
					String tnr = rs.getString("TNR_VIP").trim();
					String tmr = rs.getString("TMR_VIP").trim();
					String tct = rs.getString("TCT_VIP").trim();
					String pto = rs.getString("PTO_VIP").trim();
					String pva = rs.getString("PVA_VIP").trim();
					String lut = rs.getString("LAST_UPDATED_TIME").trim();
					clientesdelDiaSucursal[cont].setNum_vip(num != null ? BigInteger.valueOf(Long.valueOf(num)) : null);
					clientesdelDiaSucursal[cont].setNom_vip(nom != null ? nom : null);
					clientesdelDiaSucursal[cont].setTel_vip(tel != null ? tel : null);
					clientesdelDiaSucursal[cont].setEma_vip(ema != null ? ema : null);
					clientesdelDiaSucursal[cont]
							.setFec_vip(!fec.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fec) : null);
					clientesdelDiaSucursal[cont]
							.setSal_vip(sal != null ? BigDecimal.valueOf(Double.parseDouble(sal)) : null);
					clientesdelDiaSucursal[cont]
							.setFuc_vip(!fuc.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fuc) : null);
					clientesdelDiaSucursal[cont]
							.setMuc_vip(muc != null ? BigDecimal.valueOf(Double.parseDouble(muc)) : null);
					clientesdelDiaSucursal[cont]
							.setFup_vip(!fup.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fup) : null);
					clientesdelDiaSucursal[cont]
							.setMup_vip(mup != null ? BigDecimal.valueOf(Double.parseDouble(mup)) : null);
					clientesdelDiaSucursal[cont].setTnr_vip(tnr != null ? BigInteger.valueOf(Long.valueOf(tnr)) : null);
					clientesdelDiaSucursal[cont]
							.setTmr_vip(tmr != null ? BigDecimal.valueOf(Double.parseDouble(tmr)) : null);
					clientesdelDiaSucursal[cont]
							.setTct_vip(tct != null ? BigDecimal.valueOf(Double.parseDouble(tct)) : null);
					clientesdelDiaSucursal[cont]
							.setPto_vip(pto != null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					clientesdelDiaSucursal[cont]
							.setPva_vip(pva != null ? BigDecimal.valueOf(Double.parseDouble(pva)) : null);
					clientesdelDiaSucursal[cont].setDatetime_vip(lut != null ? lut : null);
					log.info("--PROC.2-- Por enviar al WS:"+clientesdelDiaSucursal[cont].getNum_vip()+"-"+clientesdelDiaSucursal[cont].getNom_vip()+"-"+clientesdelDiaSucursal[cont].getPto_vip()+"-"+clientesdelDiaSucursal[cont].getDatetime_vip());
					cont++;
				}
				try {
					if (clientesdelDiaSucursal.length > 0) {
						log.info("--PROC.2-- A punto de enviar " + clientesdelDiaSucursal.length + " clientes");
						String resp = ws.agregarClientes(cuenta, clientesdelDiaSucursal);
						log.info("--PROC.2-- La respuesta del WS es:" + resp);
					}
				} catch (RemoteException e) {					
					log.error(ExceptionUtils.getStackTrace (e));					
				}

				break;
			case 3:
				ClientesVip[] clientesTodos;
				try {
					log.info(
							"--PROC.3-- Ejecutando el proceso 3 (Agregar todos los clientes del repositorio central en esta sucursal.)");
					clientesTodos = ws.listarClientes(cuenta);
					for (ClientesVip clientesVip : clientesTodos) {

						String Num_vip = clientesVip.getNum_vip() != null ? "'" + clientesVip.getNum_vip() + "'" : "0";
						String Nom_vip = clientesVip.getNom_vip() != null ? "'" + clientesVip.getNom_vip() + "'" : "''";
						String Tel_vip = clientesVip.getTel_vip() != null ? "'" + clientesVip.getTel_vip() + "'" : "''";
						String Ema_vip = clientesVip.getEma_vip() != null ? "'" + clientesVip.getEma_vip() + "'" : "''";
						String Fec_vip = clientesVip.getFec_vip() != null
								? "DATE(" + dateFormat2.format(clientesVip.getFec_vip()) + ")" : "{//}";
						String Sal_vip = clientesVip.getSal_vip() != null ? "" + clientesVip.getSal_vip() + "" : "0";
						String Fuc_vip = clientesVip.getFuc_vip() != null
								? "DATE(" + dateFormat2.format(clientesVip.getFuc_vip()) + ")" : "{//}";
						String Muc_vip = clientesVip.getMuc_vip() != null ? "" + clientesVip.getMuc_vip() + "" : "0";
						String Fup_vip = clientesVip.getFup_vip() != null
								? "DATE(" + dateFormat2.format(clientesVip.getFup_vip()) + ")" : "{//}";
						String Mup_vip = clientesVip.getMup_vip() != null ? "" + clientesVip.getMup_vip() + "" : "0";
						String Tnr_vip = clientesVip.getTnr_vip() != null ? "" + clientesVip.getTnr_vip() + "" : "0";
						String Tmr_vip = clientesVip.getTmr_vip() != null ? "" + clientesVip.getTmr_vip() + "" : "0";
						String Tct_vip = clientesVip.getTct_vip() != null ? "" + clientesVip.getTct_vip() + "" : "0";
						String Pto_vip = clientesVip.getPto_vip() != null ? "" + clientesVip.getPto_vip() + "" : "0";
						String Pva_vip = clientesVip.getPva_vip() != null ? "" + clientesVip.getPva_vip() + "" : "0";
						String date_time = clientesVip.getDatetime_vip() != null ? "DATETIME("
								+ dateTimeFormat2.format(dateTimeFormat.parse(clientesVip.getDatetime_vip())) + ")"
								: "{//}";
						sql = "INSERT INTO CLI_VIP VALUES(" + Num_vip + "," + Nom_vip + "," + Tel_vip + "," + Ema_vip
								+ ", " + Fec_vip + "," + Sal_vip + "," + Fuc_vip + "," + Muc_vip + "," + Fup_vip + ","
								+ Mup_vip + "," + Tnr_vip + "," + Tmr_vip + "," + Tct_vip + "," + Pto_vip + ","
								+ Pva_vip + ");";
						// VERIFICAMOS QUE NO EXISTA ESE REGISTRO:
						String sqlBusq = "SELECT COUNT(*) AS cuantos FROM CLI_VIP WHERE NUM_VIP = " + Num_vip;
						String sqlUpdate = "UPDATE CLI_VIP SET NOM_VIP=" + Nom_vip + ",TEL_VIP=" + Tel_vip + ",EMA_VIP="
								+ Ema_vip + ",FEC_VIP= " + Fec_vip + ",SAL_VIP=" + Sal_vip + ",FUC_VIP=" + Fuc_vip
								+ ",MUC_VIP=" + Muc_vip + ",FUP_VIP=" + Fup_vip + ",MUP_VIP=" + Mup_vip + ",TNR_VIP="
								+ Tnr_vip + ",TMR_VIP=" + Tmr_vip + ",TCT_VIP=" + Tct_vip + ",PTO_VIP=" + Pto_vip
								+ ",PVA_VIP=" + Pva_vip + " WHERE NUM_VIP = " + Num_vip;
						rs = stmt.executeQuery(sqlBusq);
						log.info("--PROC.3-- Buscando registros en cli_vip espejo del num_vip: "+Num_vip);
						log.info("--PROC.3-- Query busqueda: "+sqlBusq);
						// rs.last();
						int cuantos = 0;
						while (rs.next()) {
							cuantos = rs.getInt("cuantos");
						}

						// rs.beforeFirst();
						boolean hayRegs = false;
						if (cuantos >= 1) {
							// log.info("SI hay registros de:
							// "+Num_vip);
							hayRegs = true;
						} else {
							// log.info("NO hay registros de:
							// "+Num_vip);
							hayRegs = false;
						}
						if (!hayRegs) // SOLO EN EL CASO DE QUE NO EXISTA EL
										// REGISTRO DEBE DE INSERTAR:
						{

							log.info("--PROC.3-- Query insercion:"+sql);
							stmt.execute(sql);
							// DEBE PONER LA FECHA Y HORA DEL SISTEMA WEB EN LA
							// TABLA DE CLI_VIP_BIT
							String sqlUpdateBit = "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time
									+ " WHERE NUM_VIP = " + Num_vip;
							log.info("--PROC.3-- Query actualizacion:"+ sqlUpdateBit);
							stmt.execute(sqlUpdateBit);
						} else {
							// log.info(sqlUpdate);
							log.info("--PROC.3-- Query actualizacion:"+ sqlUpdate);
							stmt.execute(sqlUpdate);
							// DEBE PONER LA FECHA Y HORA DEL SISTEMA WEB EN LA
							// TABLA DE CLI_VIP_BIT
							String sqlUpdateBit = "UPDATE CLI_VIP_BIT SET last_updated_time = " + date_time
									+ " WHERE NUM_VIP = " + Num_vip;
							log.info("--PROC.3-- Query actualizacion:"+ sqlUpdateBit);
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
				 * COMIENZO DEL REGISTRO DE MOVIMIENTOS COMPLETOS DE LA SUCURSAL
				 */

				log.info(
						" Subiendo todos los movimientos de la sucursal ");
				sql = "SELECT NUM_VIP, DOC_VIP, FEC_VIP, MON_VIP, CAJ_VIP, DET_VIP, PTO_VIP  FROM  MOV_VIP WHERE NUM_VIP <>'        ' AND LEN(ALLTRIM(NUM_VIP))=8";
				rs = stmt.executeQuery(sql);
				log.info("--PROC.4-- Query extraccion:"+ sql);
				contador = 0;
				while (rs.next()) {
					contador++;
				}
				MovimientosVip[] movimientosSucursal = new MovimientosVip[contador];
				cont = 0;
				rs = stmt.executeQuery(sql);
				while (rs.next()) {

					movimientosSucursal[cont] = new MovimientosVip();
					String num = rs.getString("NUM_VIP").trim();
					String doc = rs.getString("DOC_VIP").trim();
					String fec = rs.getString("FEC_VIP").trim();
					String mon = rs.getString("MON_VIP").trim();
					String caj = rs.getString("CAJ_VIP").trim();
					String det = rs.getString("DET_VIP").trim();
					String pto = rs.getString("PTO_VIP").trim();

					movimientosSucursal[cont].setNum_vip(num != null ? BigInteger.valueOf(Long.valueOf(num)) : null);
					movimientosSucursal[cont].setDoc_vip(doc != null ? doc : null);
					movimientosSucursal[cont].setDet_vip(det != null ? det : null);
					movimientosSucursal[cont].setCaj_vip(caj != null ? caj : null);
					movimientosSucursal[cont]
							.setFec_vip(!fec.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fec) : null);
					movimientosSucursal[cont]
							.setMon_vip(mon != null ? BigDecimal.valueOf(Double.parseDouble(mon)) : null);
					movimientosSucursal[cont]
							.setPto_vip(pto != null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					log.info("--PROC.4-- Movimiento:"+movimientosSucursal[cont]);
					cont++;
				}
				try {
					if (movimientosSucursal.length > 0) {
						MovimientosVip[][] movDiv = chunkArray(movimientosSucursal, 1000);
						for (MovimientosVip[] movimientosVips : movDiv) {
							log.info("--PROC.4-- A punto de enviar " + movimientosVips.length + " movimientos");
							String resp = ws.agregarMovimientos(cuenta, movimientosVips);
							log.info("--PROC.4-- La respuesta es:" + resp);
						}

					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				/*
				 * FIN DEL REGISTRO DE MOVIMIENTOS
				 */

				break;
			case 5:
				/*
				 * COMIENZO DEL REGISTRO DE MOVIMIENTOS
				 */

				log.info(
						"--PROC.5-- Subiendo los movimientos de los ultimos dias ");
				sql = "SELECT NUM_VIP,  DOC_VIP, FEC_VIP, MON_VIP, CAJ_VIP, DET_VIP, PTO_VIP FROM MOV_VIP  WHERE (DATE() - fec_vip <= 5 AND NOT EMPTY(fec_vip) = .T. ) AND LEN(ALLTRIM(NUM_VIP))=8";
				rs = stmt.executeQuery(sql);
				log.info("--PROC.5-- Query extraccion:"+ sql);
				contador = 0;
				while (rs.next()) {
			
					contador++;
				}
				MovimientosVip[] movimientosDiaSucursal = new MovimientosVip[contador];
				cont = 0;
				rs = stmt.executeQuery(sql);
				while (rs.next()) {

					movimientosDiaSucursal[cont] = new MovimientosVip();
					String num = rs.getString("NUM_VIP").trim();
					String doc = rs.getString("DOC_VIP").trim();
					String fec = rs.getString("FEC_VIP").trim();
					String mon = rs.getString("MON_VIP").trim();
					String caj = rs.getString("CAJ_VIP").trim();
					String det = rs.getString("DET_VIP").trim();
					String pto = rs.getString("PTO_VIP").trim();

					movimientosDiaSucursal[cont].setNum_vip(num != null ? BigInteger.valueOf(Long.valueOf(num)) : null);
					movimientosDiaSucursal[cont].setDoc_vip(doc != null ? doc : null);
					movimientosDiaSucursal[cont].setDet_vip(det != null ? det : null);
					movimientosDiaSucursal[cont].setCaj_vip(caj != null ? caj : null);
					movimientosDiaSucursal[cont]
							.setFec_vip(!fec.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fec) : null);
					movimientosDiaSucursal[cont]
							.setMon_vip(mon != null ? BigDecimal.valueOf(Double.parseDouble(mon)) : null);
					movimientosDiaSucursal[cont]
							.setPto_vip(pto != null ? BigDecimal.valueOf(Double.parseDouble(pto)) : null);
					log.info("--PROC.5-- Movimiento:"+movimientosDiaSucursal[cont]);
					cont++;
				}
				try {
					if (movimientosDiaSucursal.length > 0) {
						log.info("--PROC.5-- A punto de enviar " + movimientosDiaSucursal.length + " movimientos");
						String resp = ws.agregarMovimientos(cuenta, movimientosDiaSucursal);
						log.info("--PROC.5-- La respuesta es:" + resp);
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				/*
				 * FIN DEL REGISTRO DE MOVIMIENTOS
				 */
				break;
			case 6:
				/*
				 * COMIENZO DEL REGISTRO DE FACTURAS COMPLETAS DE LA SUCURSAL
				 */

				log.info(
						"--PROC.6-- Subiendo todas las facturas de ventas de tarjetas de la sucursal ");
				sql = "SELECT FECHA, DESCRIP, ORDEN, FACTURA, NUMERO, TOTALF FROM FACT_VIP";
				rs = stmt.executeQuery(sql);
				log.info("--PROC.6-- Query extraccion:"+ sql);
				contador = 0;
				while (rs.next()) {
					// log.info("Calculando el numero de registros
					// con: " + contador);
					contador++;
				}
				FacturasVip[] facturasVip = new FacturasVip[contador];
				cont = 0;
				rs = stmt.executeQuery(sql);
				while (rs.next()) {

					facturasVip[cont] = new FacturasVip();
					String fecha = rs.getString("FECHA").trim();
					String descrip = rs.getString("DESCRIP").trim();
					String orden = rs.getString("ORDEN").trim();
					String factura = rs.getString("FACTURA").trim();
					String numero = rs.getString("NUMERO").trim();
					String totalf = rs.getString("TOTALF").trim();

					facturasVip[cont]
							.setFecha(!fecha.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fecha) : null);
					facturasVip[cont].setDescrip(descrip != null ? descrip : null);
					facturasVip[cont].setOrden(orden != null ? orden : null);
					facturasVip[cont].setFactura(factura != null ? factura : null);
					facturasVip[cont].setNumero(numero != null ? numero : null);
					facturasVip[cont].setTotalf(totalf != null ? BigDecimal.valueOf(Double.parseDouble(totalf)) : null); 
				
					
					log.info("--PROC.6-- Factur:"+facturasVip[cont]);
					cont++;
				}
				try {
					if (facturasVip.length > 0) {
						FacturasVip[][] factDiv = chunkFactArray(facturasVip, 1000);
						for (FacturasVip[] facturasVips : factDiv) {
							log.info("--PROC.6-- A punto de enviar " + facturasVips.length + " facturas de tarjetas VIP");
							String resp = ws.agregarFacturasVIP(cuenta, facturasVips);
							log.info("--PROC.6-- La respuesta es:" + resp);
						}

					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				/*
				 * FIN DEL REGISTRO DE FACTURAS VIP COMPLETAS DE LA SUCURSAL
				 */

				break;
			case 7:
				/*
				 * COMIENZO DEL REGISTRO DE FACTURAS
				 */

				log.info(
						"--PROC.7-- Subiendo las facturas de los ultimos dias");
				//AHORA SUBIMOS TODAS, ANTES SOLO ERAN LAS DE LOS ULTIMOS 5 DIAS CON EL FILTRO:  WHERE (DATE() - FECHA <= 5 AND NOT EMPTY(FECHA) = .T. )
				sql = "SELECT  FECHA, DESCRIP, ORDEN, FACTURA, NUMERO, TOTALF FROM FACT_VIP ";
				rs = stmt.executeQuery(sql);
				log.info("--PROC.7-- Query extraccion:"+ sql);
				contador = 0;
				while (rs.next()) {
					// log.info("Calculando el numero de registros
					// con: " + contador);
					contador++;
				}
				FacturasVip[] facturasDiaSucursal = new FacturasVip[contador];
				cont = 0;
				rs = stmt.executeQuery(sql);
				while (rs.next()) {

					facturasDiaSucursal[cont] = new FacturasVip();
					String fecha = rs.getString("FECHA").trim();
					String descrip = rs.getString("DESCRIP").trim();
					String orden = rs.getString("ORDEN").trim();
					String factura = rs.getString("FACTURA").trim();
					String numero = rs.getString("NUMERO").trim();
					String totalf = rs.getString("TOTALF").trim();

					facturasDiaSucursal[cont]
							.setFecha(!fecha.equalsIgnoreCase("1899-12-30") ? dateFormat.parse(fecha) : null);
					facturasDiaSucursal[cont].setDescrip(descrip != null ? descrip : null);
					facturasDiaSucursal[cont].setOrden(orden != null ? orden : null);
					facturasDiaSucursal[cont].setFactura(factura != null ? factura : null);
					facturasDiaSucursal[cont].setNumero(numero != null ? numero : null);
					facturasDiaSucursal[cont].setTotalf(totalf != null ? BigDecimal.valueOf(Double.parseDouble(totalf)) : null); 

					log.info("--PROC.7-- Factura:"+facturasDiaSucursal[cont]);
					
					
					cont++;
				}
				try {
					if (facturasDiaSucursal.length > 0) {
						log.info("--PROC.7-- A punto de enviar " + facturasDiaSucursal.length + " facturas");
						String resp = ws.agregarFacturasVIP(cuenta, facturasDiaSucursal);
						log.info("--PROC.7-- La respuesta es:" + resp);
					}
				} catch (RemoteException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				/*
				 * FIN DEL REGISTRO DE MOVIMIENTOS
				 */
				break;	
			default:
				log.error("El argumento proporcionado es incorrecto");
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

	public static MovimientosVip[][] chunkArray(MovimientosVip[] array, int chunkSize) {
		int numOfChunks = (int) Math.ceil((double) array.length / chunkSize);
		MovimientosVip[][] output = new MovimientosVip[numOfChunks][];

		for (int i = 0; i < numOfChunks; ++i) {
			int start = i * chunkSize;
			int length = Math.min(array.length - start, chunkSize);

			MovimientosVip[] temp = new MovimientosVip[length];
			System.arraycopy(array, start, temp, 0, length);
			output[i] = temp;
		}

		return output;
	}
	public static ClientesVip[][] chunkCliArray(ClientesVip[] array, int chunkSize) {
		int numOfChunks = (int) Math.ceil((double) array.length / chunkSize);
		ClientesVip[][] output = new ClientesVip[numOfChunks][];

		for (int i = 0; i < numOfChunks; ++i) {
			int start = i * chunkSize;
			int length = Math.min(array.length - start, chunkSize);

			ClientesVip[] temp = new ClientesVip[length];
			System.arraycopy(array, start, temp, 0, length);
			output[i] = temp;
		}

		return output;
	}

	public static FacturasVip[][] chunkFactArray(FacturasVip[] array, int chunkSize) {
		int numOfChunks = (int) Math.ceil((double) array.length / chunkSize);
		FacturasVip[][] output = new FacturasVip[numOfChunks][];

		for (int i = 0; i < numOfChunks; ++i) {
			int start = i * chunkSize;
			int length = Math.min(array.length - start, chunkSize);

			FacturasVip[] temp = new FacturasVip[length];
			System.arraycopy(array, start, temp, 0, length);
			output[i] = temp;
		}

		return output;
	}

}
