$('#selectLanguageDropdown').localizationTool({
                'defaultLanguage' : 'ar_TN', /* (optional) although must be defined if you don't want en_GB */
                'showFlag': false,            /* (optional) show/hide the flag */
                'showCountry': false,         /* (optional) show/hide the country name */
                'ignoreUnmatchedSelectors' : true,
                'showLanguage': true,        /* (optional) show/hide the country language */
                'onLanguageSelected' : function (languageCode) {
                    /*
                     * When the user translates we set the cookie
                     */
                    $.cookie('userLanguage', languageCode);
                    return true;
                },
                /* 
                 * Translate your strings below
                 */
                'strings' : {
                    /* 
                     * You can specify the text string to translate directly... 
                     */
                    'الوصول السريع' : {
                        'en_GB' : 'Quick Access'
                    },
                    'المهام' : {
                        'en_GB' : 'Missions'
                    },
                    'الحالة' : {
                        'en_GB' : 'Status'
                    },
                    'صفحة المراقبة' : {
                        'en_GB' : 'Supervision'
                    },
                    'طلب إستشارة' : {
                        'en_GB' : 'Consultation Statement'
                    },
                    'طلب إنذار' : {
                        'en_GB' : 'Alarm Statement'
                    },
                    'الصفحة الرئيسية' : {
                        'en_GB' : 'Home Page'
                    },
                    'الملف الشخصي' : {
                        'en_GB' : 'My Profile'
                    },
                    'تسجيل خروج' : {
                        'en_GB' : 'LogOut'
                    },
                    'لقد تم إرسال التيكت إلى' : {
                        'en_GB' : 'Ticket has been sent to Techoffice'
                    },
                    'تعليق' : {
                        'en_GB' : 'Comments'
                    },
                    'تاريخ' : {
                        'en_GB' : 'Date'
                    },
                    'نوع المهمة' : {
                        'en_GB' : 'Mission Type'
                    },
                    'المسؤول' : {
                        'en_GB' : 'Assigned'
                    },
                    'المشاركون' : {
                        'en_GB' : 'Participants'
                    },
                    'الأهمية' : {
                        'en_GB' : 'Priority'
                    },
                    'أظهار' : {
                        'en_GB' : 'Show'
                    },
                    'مرتفع' : {
                        'en_GB' : 'High'
                    },
                    'عرض الكل' : {
                        'en_GB' : 'Show All'
                    },
                    'لا يوجد مهام' : {
                        'en_GB' : 'No Missions'
                    },
                    'جدول الاعمال' : {
                        'en_GB' : 'Calendar'
                    },
                    'المحاسبة' : {
                        'en_GB' : 'E-account'
                    },
                    'ارشيف' : {
                        'en_GB' : 'Archive'
                    },
                    'القضايا/الإنذارات' : {
                        'en_GB' : 'Cases/Alarms'
                    },
                    'الموظفين' : {
                        'en_GB' : 'Users'
                    },
                    'عملاء' : {
                        'en_GB' : 'Customers'
                    },
                    'آخر الأحداث ' : {
                        'en_GB' : 'Latest Events'
                    },
                    'لا يوجد أحداث' : {
                        'en_GB' : 'No Events'
                    },
                    'أخبار المكتب' : {
                        'en_GB' : 'Office News'
                    },
                    'تويتر' : {
                        'en_GB' : 'Twitter'
                    },
                    'فيسبوك' : {
                        'en_GB' : 'Facebook'
                    },
                    'اضافة خبر' : {
                        'en_GB' : 'Add Blog'
                    },
                    'أهلاً' : {
                        'en_GB' : 'Welcome'
                    },
                    'الموضوع' : {
                        'en_GB' : 'Subject'
                    },
                    'التفاصيل' : {
                        'en_GB' : 'Description'
                    },
                    'إضافة' : {
                        'en_GB' : 'Add'
                    },
                    'إلغاء' : {
                        'en_GB' : 'Close'
                    },
                    'البريد الإلكتروني' : {
                        'en_GB' : 'Email'
                    },
                    'عنوان التيكت' : {
                        'en_GB' : 'Ticket Subject'
                    },
                    'اسم الحدث' : {
                        'en_GB' : 'Event Name'
                    },
                    'وقت البدء' : {
                        'en_GB' : 'Start Date'
                    },
                    'وقت الانتهاء' : {
                        'en_GB' : 'End Date'
                    },
                    'اضافة احداث' : {
                        'en_GB' : 'Add Event'
                    },
                    'تحديث' : {
                        'en_GB' : 'Update'
                    },
                    'إغلاق' : {
                        'en_GB' : 'Close'
                    },
                    'اضاف مهام' : {
                        'en_GB' : 'Add Mission'
                    },
                    'مهام الى' : {
                        'en_GB' : 'To'
                    },
                    'e-Lawyer الحقوق محفوظة إلى' : {
                        'en_GB' : 'Copyright E-lawyer'
                    },
                    'الإسم الأول' : {
                        'en_GB' : 'First Name'
                    },
                    'الإسم الثاني' : {
                        'en_GB' : 'Second Name'
                    },
                    'الإسم الثالث' : {
                        'en_GB' : 'Third Name'
                    },
                    'الإسم الرابع' : {
                        'en_GB' : 'Last Name'
                    },
                    'مدينة / بلد' : {
                        'en_GB' : 'City '
                    },
                    'هاتف 1' : {
                        'en_GB' : 'Phone 1'
                    },

                    'هاتف 2' : {
                        'en_GB' : 'Phone 2'
                    },

                    'هاتف 3' : {
                        'en_GB' : 'Phone 3'
                    },

                    'هاتف 4' : {
                        'en_GB' : 'Phone 4'
                    },

                    'هاتف 5' : {
                        'en_GB' : 'Phone 5'
                    },

                    'هاتف 6' : {
                        'en_GB' : 'Phone 6'
                    },
                    'الوظيفة' : {
                        'en_GB' : 'Major'
                    },
                    'بحث' : {
                        'en_GB' : 'Search'
                    },
                    'الاسم الاول' : {
                        'en_GB' : 'First Name'
                    },
                    'اضافة عميل' : {
                        'en_GB' : 'Add Customer'
                    },
                    'الاسم الثاني' : {
                        'en_GB' : 'Second Name'
                    },
                    'الاسم الثالث' : {
                        'en_GB' : 'Third Name'
                    },
                    'اسم العائلة' : {
                        'en_GB' : 'Last Name'
                    },
                    'رقم الهوية' : {
                        'en_GB' : 'ID Number'
                    },
                    'العنوان' : {
                        'en_GB' : 'Address'
                    },
                    'الشارع' : {
                        'en_GB' : 'Street'
                    },
                    'القسيمة' : {
                        'en_GB' : 'Kasima'
                    },
                    'نوع البيت' : {
                        'en_GB' : 'House Type'
                    },
                    'رقم البيت' : {
                        'en_GB' : 'House Number'
                    },
                    'طابق' : {
                        'en_GB' : 'Floor'
                    },
                    'عنوان الكتروني' : {
                        'en_GB' : 'E Address'
                    },
                    'بريد الكتروني' : {
                        'en_GB' : 'Email'
                    },
                    'فاكس' : {
                        'en_GB' : 'Fax'
                    },
                    'إختيار الصورة' : {
                        'en_GB' : 'Choose Photo'
                    },
                    'اسم المستخدم' : {
                        'en_GB' : 'User Name'
                    },
                    'كلمة السر' : {
                        'en_GB' : 'Password'
                    },
                    'الجنس' : {
                        'en_GB' : 'Gender'
                    },
                    'ذكر' : {
                        'en_GB' : 'Male'
                    },
                    'نثى' : {
                        'en_GB' : 'Female'
                    },
                    'رقم العضوية' : {
                        'en_GB' : 'ID Member'
                    },
                    'غرفة' : {
                        'en_GB' : 'Room'
                    },
                    'لينكد أين' : {
                        'en_GB' : 'LinkedIn'
                    },
                    'إنستجرام' : {
                        'en_GB' : 'Instagram'
                    },
                    'سناب شات' : {
                        'en_GB' : 'SnapChat'
                    },
                    'ملاحظات' : {
                        'en_GB' : 'Comments'
                    },
                    'عنوان القضية' : {
                        'en_GB' : 'Case Subject'
                    },
                    'رقم القضية' : {
                        'en_GB' : '#Case ID'
                    },
                    'الإشعارات' : {
                        'en_GB' : 'Notifications'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },
                    'الإنذارات' : {
                        'en_GB' : 'Alarms'
                    },

                }
            });
            var userLanguage = $.cookie('userLanguage');
            if (typeof userLanguage !== 'undefined') {
                $('#selectLanguageDropdown').localizationTool('translate', userLanguage);
            }
            $('body').show();