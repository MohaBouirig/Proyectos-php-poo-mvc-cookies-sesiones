�� < ? p h p 	 
 	 / * s u b s t r _ r e p l a c e ( " c a d e n a " ,   " s u b s t i t u t " ,   i n i c i ,   [ l o n g i t u d ] ) .   
 	   * S u b s t i t u e i x   u n a   s u b c a d e n a   d e   " c a d e n a "   d e l i m i t a d a   p e l s   p a r � m e t r e s   i n i c i 
 	   * i   o p c i o n a l m e n t e   l o n g i t u d   a m b   l a   c a d e n a   " s u b s t i t u t " . 
 	   * E l   p a r � m e t r e   i n i c i  ` s   u n   n o m b r e   e n t e r .   S i  ` s   p o s i t i u ,   e l   r e m p l a � a m e n t   
 	   * s ' i n i c i a r �   e n   l a   p o s i c iB   d e   l a   c a d e n a   q u e   c o i n c i d e i x i   a m b   a q u e s t   n_ m e r o . 
 	   * S i  ` s   n e g a t i u ,   e l   r e m p l a � a m e n t   s ' i n i c i a r �   e n   l a   p o s i c iB   d e   l a   c a d e n a   
 	   * q u e   c o i n c i d e i x i   a m b   a q u e s t   n_ m e r o   c o m e n � a n t   p e l   f i n a l   d e   l a   c a d e n a . 
 	   * S i   n o   i n d i q u e m   l o n g i t u d   e s   r e a l i t z a r �   l a   s u b s t i t u c iB   f i n s   a r r i b a r   a l 
 	   * f i n a l   d e   l a   c a d e n a ,   s i   s ' i n d i c a   l o n g i t u d   i  ` s   p o s i t i v a   e s   r e a l i t z a r � 
 	   * l a   s u b s t i t u c iB   t a n t e s   p o s i c i o n s   c o m   i n d i q u i   l o n g i t u d .   S i  ` s   n e g a t i u 
 	   * l a   s u b s t i t u c iB   e s   r e a l i t z a r �   d u r a n t   t o t a   l a   c a d e n a   m e n y s   e n   l a   
 	   * q u a n t i t a t   d e   c a r � c t e r s   f i n a l s   d e   l a   c a d e n a   q u e   c o i n c i d e i x i   a m b   l o n g i t u d . * / 
 	   
 	   $ c a d e n a   =   " SB c   u n a   c a d e n a " ; 
 	   $ s u b s t i t u t   =   " f r a s e " ; 
 	   $ r e s u l t a t   =   s u b s t r _ r e p l a c e ( $ c a d e n a ,   $ s u b s t i t u t ,   9 ) ; 
 	   e c h o   " < p > $ r e s u l t a t . < b r / > " ; 
 	   $ r e s u l t a t   =   s u b s t r _ r e p l a c e ( $ c a d e n a ,   $ s u b s t i t u t ,   9 ,   5 ) ; 
 	   e c h o   " $ r e s u l t a t . < b r / > " ; 
 	   $ r e s u l t a t   =   s u b s t r _ r e p l a c e ( $ c a d e n a ,   $ s u b s t i t u t ,   9 ,   - 3 ) ; 
 	   e c h o   " $ r e s u l t a t . < b r / > " ; 
 	   $ r e s u l t a t   =   s u b s t r _ r e p l a c e ( $ c a d e n a ,   $ s u b s t i t u t ,   - 9 ) ; 
 	   e c h o   " $ r e s u l t a t . < b r / > " ; 
 	   $ r e s u l t a t   =   s u b s t r _ r e p l a c e ( $ c a d e n a ,   $ s u b s t i t u t ,   - 9 ,   - 3 ) ; 
 	   e c h o   " $ r e s u l t a t . < b r / > " ; 
 	   
 	   / * s t r _ r e p l a c e ( " a g u l l a " ,   " s u b s t i t u t " ,   " p a l l e r " ,   [ n o m b r e   s u b s t i t u c i o n s ] ) . 
 	     * R e t o r n a   e l   p a l l e r   ( c a d e n a )   a m b   l e s   a g u l l e s   ( o c u r r � n c i e s   d ' u n a   m a t e i x a   s u b c a d e n a ) 
 	     * r e m p l a � a d e s   p e r   " s u b s t i t u t " . * / 
 	     
 	     $ a g u l l a   =   " a " ; 
 	     $ s u b s t i t u t   =   " i " ; 
 	     $ r e s u l t a t   =   s t r _ r e p l a c e ( $ a g u l l a , $ s u b s t i t u t , $ c a d e n a ) ; 
 	     e c h o   " $ r e s u l t a t . < b r / > " ;     
 	     
 	     / * s t r t o u p p e r ( " c a d e n a " ) .   C o n v e r t e i x   l e s   m i n_ s c u l e s   d e   l a   c a d e n a   e n   m a j_ s c u l e s . * / 
 	     
 	     $ r e s u l t a t   =   s t r t o u p p e r ( $ c a d e n a ) ; 
 	     e c h o   " $ r e s u l t a t . < b r / > " ;     
 	     
 	     / * s t r t o l o w e r ( " c a d e n a " ) .   C o n v e r t e i x   l e s   m a j_ s c u l e s   d e   l a   c a d e n a   e n   m i n_ s c u l e s . * / 
 	     
 	     $ r e s u l t a t   =   s t r t o l o w e r ( $ c a d e n a ) ; 
 	     e c h o   " $ r e s u l t a t . < b r / > " ;     
 	           
             e c h o " < p / > " ; 
 ? > 	 
