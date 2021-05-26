from odoo import models


class TransportOrderReport(models.AbstractModel):
    _name = 'report.sochepress_base.transport_order_report_xslx'
    _inherit = 'report.report_xlsx.abstract'

    def generate_xlsx_report(self, workbook, data, datas):
        for rec in datas:

            report_name = 'Import Rendez Vous %s' % (
                rec.name)
            worksheet = workbook.add_worksheet(report_name)

            format1 = workbook.add_format(
                {'font_size': 8, 'align': 'center', 'valign': 'vcenter',
                 'font_color': 'black', 'bold': True, 'border': 1})
            format2 = workbook.add_format(
                {'font_size': 8, 'align': 'center', 'valign': 'vcenter',
                 'font_color': 'black', 'border': 1})

            worksheet.set_row(0, 15)

            worksheet.set_column('A:A', 10)
            worksheet.set_column('B:B', 10)
            worksheet.set_column('C:C', 20)
            worksheet.set_column('D:D', 30)
            worksheet.set_column('E:E', 10)
            worksheet.set_column('F:F', 10)
            worksheet.set_column('G:G', 10)
            worksheet.set_column('H:H', 10)
            worksheet.set_column('I:I', 20)
            worksheet.set_column('J:J', 10)
            worksheet.set_column('K:K', 10)
            worksheet.set_column('L:L', 10)
            worksheet.set_column('M:M', 10)
            worksheet.set_column('N:N', 20)
            worksheet.set_column('O:O', 20)
            worksheet.set_column('P:P', 20)
            worksheet.set_column('Q:Q', 10)
            worksheet.set_column('R:R', 10)
            worksheet.set_column('S:S', 20)
            # worksheet.set_column('T:T', 20)

            worksheet.write('A1:A1', 'Id', format1)
            worksheet.write('B1:B1', 'Date-visite', format1)
            worksheet.write('C1:C1', 'Identifiant externe client', format1)
            worksheet.write('D1:D1', 'Nom', format1)
            # worksheet.write('E1:E1', 'Nom', format1)
            worksheet.write('E1:E1', 'Telephone', format1)
            worksheet.write('F1:F1', 'Mobile', format1)
            worksheet.write('G1:G1', 'Courriel', format1)
            worksheet.write('H1:H1', 'Adresse', format1)
            worksheet.write('I1:I1', 'Code postal', format1)
            worksheet.write('J1:J1', 'Ville', format1)
            worksheet.write('K1:K1', 'Latitude', format1)
            worksheet.write('L1:L1', 'Longitude', format1)
            worksheet.write('M1:M1', 'Type', format1)
            worksheet.write('N1:N1', 'Duree maximale de transport', format1)
            worksheet.write('O1:O1', 'Duree', format1)
            worksheet.write('P1:P1', 'Creneau horaire de passage', format1)
            worksheet.write('Q1:Q1', 'Commentaires', format1)
            worksheet.write('R1:R1', 'Cap_Poids', format1)
            worksheet.write('S1:S1', 'Cap_Volume', format1)
            worksheet.write('T1:T1', 'Référence de commande', format1)

            j = 1

            for col in rec.colis:
                worksheet.set_row(j, 15)

                worksheet.write(j, 0, col.name, format2)
                if rec.create_date:
                    worksheet.write(j, 1, rec.create_date.strftime("%d/%m/%Y"), format2)
                else:
                    worksheet.write(j, 1, '', format2)
                # if col.customer_id.code_portail:
                #     worksheet.write(j, 2, col.customer_id.code_portail, format2)
                # else:
                worksheet.write(j, 2, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.name:
                        worksheet.write(j, 3, col.destinator_id.name, format2)
                    else:
                        worksheet.write(j, 3, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.name:
                        worksheet.write(j, 3, col.expeditor_id.name, format2)
                    else:
                        worksheet.write(j, 3, '', format2)
                # if worksheet.write(j, 4, col.destinator_id.lastname, format2):
                #     worksheet.write(j, 4, col.destinator_id.lastname, format2)
                # else:
                #     worksheet.write(j, 4, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.phone:
                        phone_stripped = col.destinator_id.phone.replace(" ", "")
                        if phone_stripped[0] == '+':
                            phone = phone_stripped.ljust(13)[:13]
                        else:
                            if phone_stripped[0] == '0':
                                phone_212 = '+212' + phone_stripped[1:]
                                phone = phone_212.ljust(13)[:13]
                            else:
                                phone_212 = '+212' + phone_stripped[0:]
                                phone = phone_212.ljust(13)[:13]
                        worksheet.write(j, 4, phone, format2)
                    else:
                        worksheet.write(j, 4, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.phone:
                        phone_stripped = col.expeditor_id.phone.replace(" ", "")
                        if phone_stripped[0] == '+':
                            phone = phone_stripped.ljust(13)[:13]
                        else:
                            if phone_stripped[0] == '0':
                                phone_212 = '+212' + phone_stripped[1:]
                                phone = phone_212.ljust(13)[:13]
                            else:
                                phone_212 = '+212' + phone_stripped[0:]
                                phone = phone_212.ljust(13)[:13]
                        worksheet.write(j, 4, phone, format2)
                    else:
                        worksheet.write(j, 4, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.mobile:
                        mobile_stripped = col.destinator_id.mobile.replace(" ", "")
                        if mobile_stripped[0] == '+':
                            mobile = mobile_stripped.ljust(13)[:13]
                        else:
                            if mobile_stripped[0] == '0':
                                mobile_212 = '+212' + mobile_stripped[1:]
                                mobile = mobile_212.ljust(13)[:13]
                            else:
                                mobile_212 = '+212' + mobile_stripped[0:]
                                mobile = mobile_212.ljust(13)[:13]
                        worksheet.write(j, 5, mobile, format2)
                    else:
                        worksheet.write(j, 5, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.mobile:
                        mobile_stripped = col.expeditor_id.mobile.replace(" ", "")
                        if mobile_stripped[0] == '+':
                            mobile = mobile_stripped.ljust(13)[:13]
                        else:
                            if mobile_stripped[0] == '0':
                                mobile_212 = '+212' + mobile_stripped[1:]
                                mobile = mobile_212.ljust(13)[:13]
                            else:
                                mobile_212 = '+212' + mobile_stripped[0:]
                                mobile = mobile_212.ljust(13)[:13]
                        worksheet.write(j, 5, mobile, format2)
                    else:
                        worksheet.write(j, 5, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.email:
                        worksheet.write(j, 6, col.destinator_id.email, format2)
                    else:
                        worksheet.write(j, 6, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.email:
                        worksheet.write(j, 6, col.expeditor_id.email, format2)
                    else:
                        worksheet.write(j, 6, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.contact_address:
                        worksheet.write(j, 7, col.destinator_id.street, format2)
                    else:
                        worksheet.write(j, 7, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.contact_address:
                        worksheet.write(j, 7, col.expeditor_id.street, format2)
                    else:
                        worksheet.write(j, 7, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.zip:
                        worksheet.write(j, 8, col.destinator_id.zip, format2)
                    else:
                        worksheet.write(j, 8, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.zip:
                        worksheet.write(j, 8, col.expeditor_id.zip, format2)
                    else:
                        worksheet.write(j, 8, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.city:
                        worksheet.write(j, 9, col.destinator_id.city, format2)
                    else:
                        worksheet.write(j, 9, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.city:
                        worksheet.write(j, 9, col.expeditor_id.city, format2)
                    else:
                        worksheet.write(j, 9, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.partner_latitude:
                        worksheet.write(j, 10, col.destinator_id.partner_latitude, format2)
                    else:
                        worksheet.write(j, 10, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.partner_latitude:
                        worksheet.write(j, 10, col.expeditor_id.partner_latitude, format2)
                    else:
                        worksheet.write(j, 10, '', format2)
                if rec.type_ot == 'delivery':
                    if col.destinator_id.partner_longitude:
                        worksheet.write(j, 11, col.destinator_id.partner_longitude, format2)
                    else:
                        worksheet.write(j, 11, '', format2)
                if rec.type_ot == 'collecting':
                    if col.expeditor_id.partner_longitude:
                        worksheet.write(j, 11, col.expeditor_id.partner_longitude, format2)
                    else:
                        worksheet.write(j, 11, '', format2)
                if rec.type_ot == 'collecting':
                    worksheet.write(j, 12, 'Collecte', format2)
                elif rec.type_ot == 'delivery':
                    worksheet.write(j, 12, 'Livraison', format2)
                else:
                    worksheet.write(j, 12, '', format2)
                worksheet.write(j, 13, '', format2)
                worksheet.write(j, 14, 10, format2)
                worksheet.write(j, 15, '', format2)
                if col.delivery_delay_reason_id:
                    worksheet.write(j, 16, col.delivery_delay_reason_id.name, format2)
                else:
                    worksheet.write(j, 16, '', format2)
                worksheet.write(j, 17, col.weight, format2)
                worksheet.write(j, 18, col.volume, format2)
                if col.request_id.name:
                    worksheet.write(j, 19, col.request_id.name, format2)
                else:
                    worksheet.write(j, 19, '', format2)

                j = j + 1
