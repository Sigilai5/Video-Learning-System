from robobrowser import RoboBrowser
import re

user_agent='Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36'
r=RoboBrowser(parser='lxml',user_agent=user_agent)
b=RoboBrowser(parser='lxml',user_agent=user_agent)

# I will scrap for you news from Citizen tv
def getNews():
	r.open('https://citizentv.co.ke')
	print 'opened'
	news=[]
	def getmedia(link):
		b.open(link)
		text=b.find('span',{'itemprop':'description'})
		info=map(lambda x: x.text,text.find_all('p',{'class':'','id':''}))
		info[0]='\t'+info[0]
		return '\n\t'.join(info).encode('ascii','ignore')
	for i in r.find_all("div",{"class":re.compile("col-md-4 col-sm-6 col-xs-12.*")}):
		time,category=i.find('small').text.split(' | ')
		title=i.find('a').text
		link=i.find('a')['href']
		newsObject={
			'title':title,
			'content':getmedia(link),
			'link':link,
			'category':category,
			'time':time
		}
		news.append(newsObject)
	return news
print 'going to call'
news = getNews()
print news