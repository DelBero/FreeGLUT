<?PHP 
# Freeglut Web Page
# This block ensures that template.php is always hit, no matter what subdirectory 
$slashes=substr_count ( $_SERVER['PHP_SELF'], "/");
for (;$slashes>1; $slashes--) { $require_target .= "../"; }
$require_target .= "template.php";
require($require_target);

# Now set the title of the page:
setPageTitle("API Documentation");

# Make the header.
generateHeader($_SERVER['PHP_SELF']);
?>
  
<dl>
<div style="font-size: 1.6em; font-weight: bold; text-align: center;"> The Open-Source<BR>
OpenGL Utility Toolkit<BR>
(<i>freeglut</i> 2.0.0)<BR>
Application Programming Interface</div>
</dl>
<BR>   
<div style="font-size: 1.6em; font-weight: bold; text-align: center;">Version 4.0</div>
<BR>
<div style="font-size: 1.4em; font-weight: bold; text-align: center;">The <i>freeglut</i> Programming Consortium<BR>
<BR>
July, 2003</div>
    
<p><br>
 OpenGL is a trademark of Silicon Graphics, Inc. X Window System is a trademark 
of X Consortium, Inc.&nbsp; Spaceball is a registered trademark of Spatial 
Systems Inc. <br>
 The authors have taken care in preparation of this documentation but make 
no expressed or implied warranty of any kind and assumes no responsibility
 for errors or omissions. No liability is assumed for incidental or consequential
 damages in connection with or arising from the use of information or programs
 contained herein. <br>
 &nbsp; </p>
 
<h1> 1.0&nbsp;<a name="Contents"></a>
  Contents</h1>
  1.0&nbsp; <a href="#Contents">Contents</a>
   
<p>2.0&nbsp; <a href="#Introduction">Introduction</a>
  </p>
 
<p>3.0&nbsp; <a href="#Background">Background</a>
  </p>
 
<blockquote>3.1&nbsp; Design Philosophy <br>
 3.2&nbsp; Conventions <br>
 3.3&nbsp; Terminology <br>
 3.4&nbsp; Differences from GLUT 3.7</blockquote>
      
  <p><br>
 4.0&nbsp; <a href="#Initialization">Initialization Functions</a>
  </p>
   
  <blockquote>4.1&nbsp; glutInit <br>
 4.2&nbsp; glutInitWindowPosition, glutInitWindowSize <br>
 4.3&nbsp; glutInitDisplayMode <br>
 4.4&nbsp; glutInitDisplayString</blockquote>
        
    <p><br>
 5.0&nbsp; <a href="#EventProcessing">Event Processing Functions</a>
  </p>
     
    <blockquote>5.1&nbsp; glutMainLoop <br>
 5.2&nbsp; glutMainLoopEvent <br>
 5.3&nbsp; glutLeaveMainLoop</blockquote>
          
      <p><br>
 6.0&nbsp; <a href="#Window">Window Functions</a>
  </p>
       
      <blockquote>6.1&nbsp; glutCreateWindow <br>
 6.2&nbsp; glutCreateSubwindow <br>
 6.3&nbsp; glutDestroyWindow <br>
 6.4&nbsp; glutSetWindow, glutGetWindow <br>
 6.5&nbsp; glutSetWindowTitle, glutSetIconTitle <br>
 6.6&nbsp; glutReshapeWindow <br>
 6.7&nbsp; glutPositionWindow <br>
 6.8&nbsp; glutShowWindow, glutHideWindow, glutIconifyWindow <br>
 6.9&nbsp; glutPushWindow, glutPopWindow <br>
 6.10&nbsp; glutFullScreen</blockquote>
            
        <p><br>
 7.0&nbsp; <a href="#Display">Display Functions</a>
  </p>
         
        <blockquote>7.1&nbsp; glutPostRedisplay <br>
 7.2&nbsp; glutPostWindowRedisplay <br>
 7.3&nbsp; glutSwapBuffers</blockquote>
              
          <p><br>
 8.0&nbsp; <a href="#MouseCursor">Mouse Cursor Functions</a>
  </p>
           
          <blockquote>8.1&nbsp; glutSetCursor <br>
 8.2&nbsp; glutWarpPointer</blockquote>
                
            <p><br>
 9.0&nbsp; <a href="#Overlay">Overlay Functions</a>
  </p>
             
            <blockquote>9.1&nbsp; glutEstablishOverlay <br>
 9.2&nbsp; glutRemoveOverlay <br>
 9.3&nbsp; glutUseLayer <br>
 9.4&nbsp; glutPostOverlayRedisplay <br>
 9.5&nbsp; glutPostWindowOverlayRedisplay <br>
 9.6&nbsp; glutShowOverlay, glutHideOverlay</blockquote>
                  
              <p><br>
 10.0&nbsp; <a href="#Menu">Menu Functions</a>
  </p>
               
              <blockquote>10.1&nbsp; glutCreateMenu <br>
 10.2&nbsp; glutDestroyMenu <br>
 10.3&nbsp; glutGetMenu, glutSetMenu <br>
 10.4&nbsp; glutAddMenuEntry <br>
 10.5&nbsp; glutAddSubMenu <br>
 10.6&nbsp; glutChangeToMenuEntry <br>
 10.7&nbsp; glutChangeToSubMenu <br>
 10.8&nbsp; glutRemoveMenuItem <br>
 10.9&nbsp; glutAttachMenu, glutDetachMenu</blockquote>
                    
                <p><br>
 11.0&nbsp; <a href="#GlobalCallback">Global Callback Registration Functions</a>
  </p>
                 
                <blockquote>11.1&nbsp; glutTimerFunc <br>
 11.2&nbsp; glutIdleFunc</blockquote>
                      
                  <p><br>
 12.0&nbsp; <a href="#WindowCallback">Window-Specific Callback Registration
 Functions</a>
  </p>
                   
                  <blockquote>12.1&nbsp; glutDisplayFunc <br>
 12.2&nbsp; glutOverlayDisplayFunc <br>
 12.3&nbsp; glutReshapeFunc <br>
 12.4&nbsp; glutCloseFunc <br>
 12.5&nbsp; glutKeyboardFunc <br>
 12.6&nbsp; glutSpecialFunc <br>
 12.7&nbsp; glutKeyboardUpFunc <br>
 12.8&nbsp; glutSpecialUpFunc <br>
 12.9&nbsp; glutMouseFunc <br>
 12.10&nbsp; glutMotionFunc, glutPassiveMotionFunc <br>
 12.11&nbsp; glutVisibilityFunc <br>
 12.12&nbsp; glutEntryFunc <br>
 12.13&nbsp; glutJoystickFunc <br>
 12.14&nbsp; glutSpaceballMotionFunc <br>
 12.15&nbsp; glutSpaceballRotateFunc <br>
 12.16&nbsp; glutSpaceballButtonFunc <br>
 12.17&nbsp; glutButtonBoxFunc <br>
 12.18&nbsp; glutDialsFunc <br>
 12.19&nbsp; glutTabletMotionFunc <br>
 12.20&nbsp; glutTabletButtonFunc                      
                    <p>12.21&nbsp; glutMenuStatusFunc <br>
 12.22&nbsp; glutWindowStatusFunc</p>
                     </blockquote>
                        
                    <p><br>
 13.0&nbsp; <a href="#StateSetting">State Setting and Retrieval Functions</a>
  </p>
                     
                    <blockquote>13.1&nbsp; glutSetOption <br>
 13.2&nbsp; glutGet <br>
 13.3&nbsp; glutDeviceGet <br>
 13.4&nbsp; glutGetModifiers <br>
 13.5&nbsp; glutLayerGet <br>
 13.6&nbsp; glutExtensionSupported<br>
13.7 &nbsp;glutGetProcAddress<br>
                      </blockquote>
                       
                      <p><br>
 14.0&nbsp; <a href="#FontRendering">Font Rendering Functions</a>
  </p>
                       
                      <blockquote>14.1&nbsp; glutBitmapCharacter <br>
 14.2&nbsp; glutBitmapString <br>
 14.3&nbsp; glutBitmapWidth <br>
 14.4&nbsp; glutBitmapLength <br>
 14.5&nbsp; glutBitmapHeight <br>
 14.6&nbsp; glutStrokeCharacter <br>
 14.7&nbsp; glutStrokeString <br>
 14.8&nbsp; glutStrokeWidth <br>
 14.9&nbsp; glutStrokeLength <br>
 14.10&nbsp; glutStrokeHeight</blockquote>
                            
                        <p><br>
 15.0&nbsp; <a href="#GeometricObject">Geometric Object Rendering Functions</a>
  </p>
                         
                        <blockquote>15.1&nbsp; glutWireSphere, glutSolidSphere
                           <br>
 15.2&nbsp; glutWireTorus, glutSolidTorus <br>
 15.3&nbsp; glutWireCone, glutSolidCone <br>
 15.4&nbsp; glutWireCube, glutSolidCube <br>
 15.5&nbsp; glutWireTetrahedron, glutSolidTetrahedron <br>
 15.6&nbsp; glutWireOctahedron, glutSolidOctahedron <br>
 15.7&nbsp; glutWireDodecahedron, glutSolidDodecahedron <br>
 15.8&nbsp; glutWireIcosahedron, glutSolidIcosahedron <br>
 15.9&nbsp; glutWireRhombicDodecahedron, glutSolidRhombicDodecahedron <br>
 15.10&nbsp; glutWireTeapot, glutSolidTeapot</blockquote>
                              
                          <p><br>
 16.0&nbsp; <a href="#GameMode">Game Mode Functions</a>
  </p>
                           
                          <blockquote>16.1&nbsp; glutGameModeString <br>
 16.2&nbsp; glutEnterGameMode, glutLeaveGameMode <br>
 16.3&nbsp; glutGameModeGet</blockquote>
                                
                            <p><br>
 17.0&nbsp; <a href="#VideoResize">Video Resize Functions</a>
  </p>
                             
                            <blockquote>17.1&nbsp; glutVideoResizeGet <br>
 17.2&nbsp; glutSetupVideoResizing, glutStopVideoResizing <br>
 17.3&nbsp; glutVideoResize <br>
 17.4&nbsp; glutVideoPan</blockquote>
                                  
                              <p><br>
 18.0&nbsp; <a href="#ColorMap">Color Map Functions</a>
  </p>
                               
                              <blockquote>18.1&nbsp; glutSetColor, glutGetColor
                                 <br>
 18.2&nbsp; glutCopyColormap</blockquote>
                                    
                                <p><br>
 19.0&nbsp; <a href="#Miscellaneous">Miscellaneous Functions</a>
  </p>
                                 
                                <blockquote>19.1&nbsp; glutIgnoreKeyRepeat, 
glutSetKeyRepeat <br>
 19.2&nbsp; glutForceJoystickFunc <br>
 19.3&nbsp; glutReportErrors</blockquote>
                                      
                                  <p><br>
 20.0&nbsp; <a href="#UsageNotes">Usage Notes</a>
  </p>
                                   
                                  <p>21.0&nbsp; <a href="#ImplementationNotes">
 Implementation Notes</a>
  </p>
                                   
                                  <p>22.0&nbsp; <a href="#GLUT_State">GLUT 
State</a>
  </p>
                                   
                                  <p>23.0&nbsp; <a href="#Freeglut.h_Header">
 "freeglut.h" Header File</a>
  </p>
                                   
                                  <p>24.0&nbsp; <a href="#References">References</a>
  </p>
                                   
                                  <p>25.0&nbsp; <a href="#Index">Index</a>
  <br>
 &nbsp; <br>
 &nbsp; </p>
                                   
                                  <h1> 2.0&nbsp;<a name="Introduction"></a>
  Introduction</h1>
  &nbsp;                                    
                                  <h1> 3.0&nbsp;<a name="Background"></a>
  Background</h1>
  The OpenGL programming world owes a tremendous debt to Mr. Mark J. Kilgard
 for writing the OpenGL Utility Toolkit, or GLUT.&nbsp; The GLUT library
of functions allows an application programmer to create, control, and manipulate
 windows independent of what operating system the program is running on.&nbsp;
 By hiding the dependency on the operating system from the application programmer,
 he allowed people to write truly portable OpenGL applications.         
                          
                                  <p>&nbsp;&nbsp;&nbsp; Mr. Kilgard copyrighted 
his library and gave it a rather unusual license.&nbsp; Under his license, 
people are allowed freely to copy and distribute the libraries and the source 
code, but they are not allowed to modify it.&nbsp; For a long time this did 
not matter because the GLUT library worked so well and because Mr. Kilgard 
was releasing updates on a regular basis.&nbsp; But with the passage of time, 
people started wanting some slightly different behaviours in their windowing 
system.&nbsp; When Mr. Kilgard stopped supporting the GLUT library in 1999, 
having moved on to bigger and better things, this started to become a problem.
                                   </p>
                                   
                                  <p>&nbsp;&nbsp;&nbsp; In December 1999, 
Mr. Pawel Olzsta started work on an open-source clone of the GLUT library.&nbsp; 
This open-source clone, which does not use any of the GLUT source code, has 
evolved into the present <i>freeglut</i> library.&nbsp; This documentation 
specifies the application program interface to the <i>freeglut</i> library.
                                   </p>
                                   
                                  <h2> 3.1&nbsp; Design Philosophy</h2>
                                      
                                  <h2> 3.2&nbsp; Conventions</h2>
                                      
                                  <h2> 3.3&nbsp; Terminology</h2>
                                      
                                  <h2> 3.4&nbsp; Differences from GLUT 3.7</h2>
  Since the <i>freeglut</i> library was developed in order to update GLUT,
 it is natural that there will be some differences between the two.&nbsp;
Each function in the API notes any differences between the GLUT and the <i>
freeglut</i>  function behaviours.&nbsp; The important ones are summarized
here.                                    
                                  <h3> 3.4.1&nbsp; glutMainLoop Behaviour</h3>
  One of the commonest complaints about the GLUT library was that once an
application called "<tt>glutMainLoop</tt>", it never got control back.&nbsp;
There was no way for an application to loop in GLUT for a while, possibly
as a subloop while a specific window was open, and then return to the calling
function.&nbsp; A new function, "<tt>glutMainLoopEvent</tt>", has been added
to allow this functionality.&nbsp; Another function, "<tt>glutLeaveMainLoop</tt>
", has also been added to allow the application to tell <i>freeglut</i> to clean
up and close down.                                    
                                  <h3> 3.4.2&nbsp; Action on Window Closure</h3>
  Another difficulty with GLUT, especially with multiple-window programs,
is that if the user clicks on the "x" in the window header the application
exits immediately.&nbsp; The application programmer can now set an option,
"<tt> GLUT_ACTION_ON_WINDOW_CLOSE</tt>", to specify whether execution should
continue, whether GLUT should return control to the main program, or whether
GLUT should simply exit (the default).                                  
 
                                  <h3>3.4.3&nbsp; Changes to Callbacks<br>
                                   </h3>
 Several new callbacks have been added and several callbacks which were specific 
to Silicon Graphics hardware have not been implemented.&nbsp; Most or all 
of the new callbacks are listed in the GLUT Version 4 "glut.h" header file 
but did not make it into the documentation.&nbsp; The new callbacks consist 
of regular and special key release callbacks, a joystick callback, a menu 
state callback (with one argument, distinct from the menu status callback 
which has three arguments), and a window status callback <br>
 (also with one argument).&nbsp; Unsupported callbacks are the three Spaceball 
callbacks, the ButtonBox callback, the Dials callback, and the two Tablet 
callbacks.&nbsp; If the user has a need for an unsupported callback he should 
contact the <i>freeglut</i> development team.<br>
                                   
                                  <h3>3.4.4&nbsp; String Rendering<br>
                                   </h3>
 New functions have been added to render full character strings (including 
carriage returns) rather than rendering one character at a time.&nbsp; More 
functions return the widths of character strings and the font heights, in 
pixels for bitmapped fonts and in OpenGL units for the stroke fonts.<br>
                                   
                                  <h3>3.4.5&nbsp; Geometry Rendering<br>
                                   </h3>
 Two functions have been added to render a wireframe and a solid rhombic
dodecahedron.                                    
                                  <h3> 3.4.5&nbsp; Extension Function Queries</h3>
 glutGetProcAddress is a wrapper for the glXGetProcAddressARB and wglGetProcAddress
functions. 
                                  <h1> 4.0&nbsp;<a name="Initialization"></a>
  Initialization Functions</h1>
                                      
                                  <h2> 4.1&nbsp; glutInit</h2>
                                      
                                  <h2> 4.2&nbsp; glutInitWindowPosition, glutInitWindowSize</h2>
  The "<tt>glutInitWindowPosition</tt> " and "<tt>glutInitWindowSize</tt>
"  functions specify a desired position and size for windows that <i>freeglut</i>
  will create in the future.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutInitWindowPosition ( int 
x, int y ) ;</tt> <br>
                                   <tt>void glutInitWindowSize ( int width, 
int height ) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutInitWindowPosition</tt>
  " and "<tt>glutInitWindowSize</tt>" functions specify a desired position 
and size for windows that <i>freeglut</i> will create in the future.&nbsp; 
The position is measured in pixels from the upper left hand corner of the 
screen, with "x" increasing to the right and "y" increasing towards the bottom 
of the screen.&nbsp; The size is measured in pixels.&nbsp; <i>Freeglut</i>
  does not promise to follow these specifications in creating its windows, 
it certainly makes an attempt to. </p>
                                   
                                  <p>The position and size of a window are 
a matter of some subtlety.&nbsp; Most windows have a usable area surrounded 
by a border and with a title bar on the top.&nbsp; The border and title bar 
are commonly called "decorations."&nbsp; The position of the window unfortunately 
varies with the operating system.&nbsp; On Linux, it is the coordinates of 
the upper left-hand corner of its decorations.&nbsp; On Windows, it is the 
coordinates of the upper left hand corner of its usable interior.&nbsp; For 
both operating systems, the size of the window is the size of the usable interior.
                                  </p>
                                   
                                  <p>Windows has some additional quirks which 
the application programmer should know about.&nbsp; First, the minimum y-coordinate 
of a window decoration is zero.&nbsp; (This is a feature of <i>freeglut</i>
  and can be adjusted if so desired.)&nbsp; Second, there appears to be a 
minimum window width on Windows which is 104 pixels.&nbsp; The user may specify 
a smaller width, but the Windows system calls ignore it.&nbsp; It is also 
impossible to make a window narrower than this by dragging on its corner.
                                   </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>For some reason, GLUT is not affected 
by the 104-pixel minimum window width.&nbsp; If the user clicks on the corner 
of a window which is narrower than this amount, the window will immediately 
snap out to this width, but the application can call "<tt>glutReshapeWindow</tt>
  " and make a window narrower again. </p>
                                   
                                  <h2> 4.3&nbsp; glutInitDisplayMode</h2>
                                      
                                  <h2> 4.4&nbsp; glutInitDisplayString</h2>
                                      
                                  <h1> 5.0&nbsp;<a name="EventProcessing"></a>
  Event Processing Functions</h1>
  After an application has finished initializing its windows and menus, it
 enters an event loop.&nbsp; Within this loop, <i>freeglut</i> polls the
data entry devices (keyboard, mouse, etc.) and calls the application's appropriate 
callbacks.                                    
                                  <p>In GLUT, control never returned from 
the event loop (as invoked by the "<tt>glutMainLoop</tt>" function) to the 
calling function.&nbsp; This prevented an application from having re-entrant 
code, in which GLUT could be invoked from within a callback, and it prevented 
the application from doing any post-processing (such as freeing allocated 
memory) after GLUT had closed down.&nbsp; <i>Freeglut</i> allows the application 
programmer to specify more direct control over the event loop by means of 
two new functions.&nbsp; The first, "<tt>glutMainLoopEvent</tt>", processes 
a single iteration of the event loop and allows the application to use a different
event loop controller or to contain re-entrant code.&nbsp; The second, "<tt>
glutLeaveMainLoop</tt>", causes the event loop to exit nicely; this is preferable
to the application's calling "<tt>exit</tt>" from within a GLUT callback.
                                  </p>
                                   
                                  <h2> 5.1&nbsp; glutMainLoop</h2>
  The "<tt>glutMainLoop</tt>" function enters the event loop.           
                        
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutMainLoop ( void ) ;</tt>
  </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutMainLoop</tt>" function 
causes the program to enter the window event loop.&nbsp; An application should 
call this function at most once.&nbsp; It will call any application callback 
functions as required to process mouse clicks, mouse motion, key presses, 
and so on. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>In GLUT, there was absolutely no way 
for the application programmer to have control return from the "<tt>glutMainLoop</tt>
  " function to the calling function.&nbsp; <i>Freeglut</i> allows the programmer 
to force this by setting the "<tt>GLUT_ACTION_ON_WINDOW_CLOSE</tt>" option 
and invoking the "<tt>glutLeaveMainLoop</tt>" function from one of the callbacks.&nbsp;
 Stopping the program this way is preferable to simply calling "<tt>exit</tt>
  " from within a callback because this allows <i>freeglut</i> to free allocated
 memory and otherwise clean up after itself.&nbsp; (I know I just said this,
 but I think it is important enough that it bears repeating.) </p>
                                   
                                  <h2> 5.2&nbsp; glutMainLoopEvent</h2>
  The "<tt>glutMainLoopEvent</tt>" function processes a single iteration
in the <i>freeglut</i> event loop.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutMainLoopEvent ( void ) ;</tt>
 </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutMainLoopEvent</tt>
  " function causes <i>freeglut</i> to process one iteration's worth of events 
in its event loop.&nbsp; This allows the application to control its own event 
loop and still use the <i>freeglut</i> windowing system. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h2> 5.3&nbsp; glutLeaveMainLoop</h2>
  The "<tt>glutLeaveMainLoop</tt>" function causes <i>freeglut</i> to stop
 its event loop.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutLeaveMainLoop ( void ) ;</tt>
 </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutLeaveMainLoop</tt>
  " function causes <i>freeglut</i> to stop the event loop.&nbsp; If the
"<tt>  GLUT_ACTION_ON_WINDOW_CLOSE</tt>" option has been set to "<tt>GLUT_ACTION_CONTINUE_EXECUTION</tt>
  ", control will return to the function which called "<tt>glutMainLoop</tt>
  "; otherwise the application will exit. </p>
                                   
                                  <p>If the application has two nested calls 
to "<tt>glutMainLoop</tt>" and calls "<tt>glutLeaveMainLoop</tt>", the behaviour 
of <i>freeglut</i> is undefined.&nbsp; It may leave only the inner nested 
loop or it may leave both loops.&nbsp; If the reader has a strong preference 
for one behaviour over the other he should contact the <i>freeglut</i> Programming 
Consortium and ask for the code to be fixed. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h1> 6.0&nbsp;<a name="Window"></a>
  Window Functions</h1>
                                      
                                  <h2> 6.1&nbsp; glutCreateWindow</h2>
                                      
                                  <h2> 6.2&nbsp; glutCreateSubwindow</h2>
                                      
                                  <h2> 6.3&nbsp; glutDestroyWindow</h2>
                                      
                                  <h2> 6.4&nbsp; glutSetWindow, glutGetWindow</h2>
                                      
                                  <h2> 6.5&nbsp; glutSetWindowTitle, glutSetIconTitle</h2>
                                      
                                  <h2> 6.6&nbsp; glutReshapeWindow</h2>
                                      
                                  <h2> 6.7&nbsp; glutPositionWindow</h2>
                                      
                                  <h2> 6.8&nbsp; glutShowWindow, glutHideWindow, 
glutIconifyWindow</h2>
                                      
                                  <h2> 6.9&nbsp; glutPushWindow, glutPopWindow</h2>
                                      
                                  <h2> 6.10&nbsp; glutFullScreen</h2>
                                      
                                  <h1> 7.0&nbsp;<a name="Display"></a>
  Display Functions</h1>
                                      
                                  <h2> 7.1&nbsp; glutPostRedisplay</h2>
                                      
                                  <h2> 7.2&nbsp; glutPostWindowRedisplay</h2>
                                      
                                  <h2> 7.3&nbsp; glutSwapBuffers</h2>
                                      
                                  <h1> 8.0&nbsp;<a name="MouseCursor"></a>
  Mouse Cursor Functions</h1>
                                      
                                  <h2> 8.1&nbsp; glutSetCursor</h2>
                                      
                                  <h2> 8.2&nbsp; glutWarpPointer</h2>
                                      
                                  <h1> 9.0&nbsp;<a name="Overlay"></a>
  Overlay Functions</h1>
  <i>Freeglut</i> does not allow overlays, although it does "answer the mail"
 with function stubs so that GLUT-based programs can compile and link against
                                   <i>freeglut</i> without modification.&nbsp; 
If the reader needs overlays, he should contact the <i>freeglut</i> Programming 
Consortium and ask for them to be implemented.&nbsp; He should also be prepared 
to assist in the implementation.                                    
                                  <h2> 9.1&nbsp; glutEstablishOverlay</h2>
  The "<tt>glutEstablishOverlay</tt>" function is not implemented in <i>freeglut</i>
 .                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutEstablishOverlay ( void 
) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutEstablishOverlay</tt>" function
is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 9.2&nbsp; glutRemoveOverlay</h2>
  The "<tt>glutRemoveOverlay</tt>" function is not implemented in <i>freeglut</i>
 .                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutRemoveOverlay ( void ) ;</tt>
 </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutRemoveOverlay</tt>" function 
is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 9.3&nbsp; glutUseLayer</h2>
  The "<tt>glutUseLayer</tt>" function is not implemented in <i>freeglut</i>
 .                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutUseLayer (&nbsp; GLenum 
layer ) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutUseLayer</tt>" function 
is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 9.4&nbsp; glutPostOverlayRedisplay</h2>
  The "<tt>glutPostOverlayRedisplay</tt> " function is not implemented in
                                  <i> freeglut</i>.                     
              
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutPostOverlayRedisplay ( void
) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutPostOverlayRedisplay</tt>
  " function is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 9.5&nbsp; glutPostWindowOverlayRedisplay</h2>
  The "<tt>glutPostWindowOverlayRedisplay</tt> " function is not implemented
 in <i>freeglut</i>.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutPostWindowOverlayRedisplay 
( int window ) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutPostWindowOverlayRedisplay</tt>
  " function is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 9.6&nbsp; glutShowOverlay, glutHideOverlay</h2>
  The "<tt>glutShowOverlay</tt>" and "<tt>glutHideOverlay</tt>" functions
are not implemented in <i>freeglut</i> .                                
   
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutShowOverlay( void ) ;</tt>
  <br>
                                   <tt>void glutHideOverlay( void ) ;</tt>
  </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutShowOverlay</tt>" and "<tt>
glutHideOverlay</tt>" functions are not implemented in <i>freeglut</i> .
                                  </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT implements these functions. </p>
                                   
                                  <h1> 10.0&nbsp;<a name="Menu"></a>
  Menu Functions</h1>
                                      
                                  <h2> 10.1&nbsp; glutCreateMenu</h2>
                                      
                                  <h2> 10.2&nbsp; glutDestroyMenu</h2>
                                      
                                  <h2> 10.3&nbsp; glutGetMenu, glutSetMenu</h2>
                                      
                                  <h2> 10.4&nbsp; glutAddMenuEntry</h2>
                                      
                                  <h2> 10.5&nbsp; glutAddSubMenu</h2>
                                      
                                  <h2> 10.6&nbsp; glutChangeToMenuEntry</h2>
                                      
                                  <h2> 10.7&nbsp; glutChangeToSubMenu</h2>
                                      
                                  <h2> 10.8&nbsp; glutRemoveMenuItem</h2>
                                      
                                  <h2> 10.9&nbsp; glutAttachMenu, glutDetachMenu</h2>
                                      
                                  <h1> 11.0&nbsp;<a name="GlobalCallback"></a>
  Global Callback Registration Functions</h1>
                                      
                                  <h2> 11.1&nbsp; glutTimerFunc</h2>
                                      
                                  <h2> 11.2&nbsp; glutIdleFunc</h2>
  The "<tt>glutIdleFunc</tt>" function sets the global idle callback. <i>
Freeglut</i>  calls the idle callback when there are no inputs from the user.
                                   
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutIdleFunc ( void (*func) 
( void ) ) ;</tt> </p>
                                   
                                  <p><tt>func&nbsp;&nbsp;&nbsp; </tt>The new
global idle callback function </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutIdleFunc</tt>" function 
specifies the function that <i>freeglut</i> will call to perform background 
processing tasks such as continuous animation when window system events are 
not being received.&nbsp; If enabled, this function is called continuously 
from <i>freeglut</i> while no events are received.&nbsp; The callback function 
has no parameters and returns no value.&nbsp; <i>Freeglut</i> does not change 
the <i>current window</i> or the <i>current menu</i> before invoking the idle
callback; programs with multiple windows or menus must explicitly set the
                                  <i>current window</i> and <i>current menu</i>
 and not rely on its current setting. <br>
 &nbsp;&nbsp;&nbsp; The amount of computation and rendering done in an idle 
callback should be minimized to avoid affecting the program's interactive
 response.&nbsp; In general, no more than a single frame of rendering should
 be done in a single invocation of an idle callback. <br>
 &nbsp;&nbsp;&nbsp; Calling "<tt>glutIdleFunc</tt>" with a NULL argument
disables the call to an idle callback. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>Application programmers should note that
if they have specified the "continue execution" action on window closure, 
                                  <i>freeglut</i> will continue to call the 
idle callback after the user has closed a window by clicking on the "x" in 
the window header bar.&nbsp; If the idle callback renders a particular window 
(this is considered bad form but is frequently done anyway), the programmer 
should supply a window closure callback for that window which changes or disables
the idle callback. </p>
                                   
                                  <h1> 12.0&nbsp;<a name="WindowCallback"></a>
  Window-Specific Callback Registration Functions</h1>
                                      
                                  <h2> 12.1&nbsp; glutDisplayFunc</h2>
                                      
                                  <h2> 12.2&nbsp; glutOverlayDisplayFunc</h2>
                                      
                                  <h2> 12.3&nbsp; glutReshapeFunc</h2>
                                      
                                  <h2> 12.4&nbsp; glutCloseFunc</h2>
                                      
                                  <h2> 12.5&nbsp; glutKeyboardFunc</h2>
                                      
                                  <h2> 12.6&nbsp; glutSpecialFunc</h2>
  The "<tt>glutSpecialFunc</tt>" function sets the window's special key press
 callback. <i>Freeglut</i> calls the special key press callback when the
user presses a special key.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutSpecialFunc ( void (*func) 
( int key, int x, int y ) ) ;</tt> </p>
                                   
                                  <p><tt>func&nbsp;&nbsp;&nbsp; </tt>The window's
new special key press callback function <br>
                                   <tt>key&nbsp;&nbsp;&nbsp;&nbsp; </tt>The 
key whose press triggers the callback <br>
                                   <tt>x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The x-coordinate of the mouse relative 
to the window at the time the key is pressed <br>
                                   <tt>y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The y-coordinate of the mouse relative 
to the window at the time the key is pressed </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutSpecialFunc</tt>" 
function specifies the function that <i>freeglut</i> will call when the user 
presses a special key on the keyboard.&nbsp; The callback function has one 
argument:&nbsp; the name of the function to be invoked ("called back") at 
the time at which the special key is pressed.&nbsp; The function returns no
value.&nbsp; <i>Freeglut</i> sets the <i>current window</i> to the window 
which is active when the callback is invoked.&nbsp; "Special keys" are the 
function keys, the arrow keys, the Page Up and Page Down keys, and the Insert 
key.&nbsp; The Delete key is considered to be a regular key. <br>
 &nbsp;&nbsp;&nbsp; Calling "<tt>glutSpecialUpFunc</tt>" with a NULL argument 
disables the call to the window's special key press callback. </p>
                                   
                                  <p>&nbsp;&nbsp;&nbsp; The "<tt>key</tt>
" argument may take one of the following defined constant values: </p>
                                   
                                  <ul>
  <li> <tt>GLUT_KEY_F1, GLUT_KEY_F2, ..., GLUT_KEY_F12</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - F1 through F12 keys</li>
   <li> <tt>GLUT_KEY_PAGE_UP, GLUT_KEY_PAGE_DOWN</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - Page Up and Page Down keys</li>
   <li> <tt>GLUT_KEY_HOME, GLUT_KEY_END</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - Home and End keys</li>
   <li> <tt>GLUT_KEY_LEFT, GLUT_KEY_RIGHT, GLUT_KEY_UP, GLUT_KEY_DOWN</tt>
  - arrow keys</li>
   <li> <tt>GLUT_KEY_INSERT</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - Insert key</li>
                                     
                                  </ul>
  <b>Changes From GLUT</b>                                    
                                  <p>None. </p>
                                   
                                  <h2> 12.7&nbsp; glutKeyboardUpFunc</h2>
  The "<tt>glutKeyboardUpFunc</tt>" function sets the window's key release
 callback. <i>Freeglut</i> calls the key release callback when the user releases 
a key.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutKeyboardUpFunc ( void (*func) 
( unsigned char key, int x, int y ) ) ;</tt> </p>
                                   
                                  <p><tt>func&nbsp;&nbsp;&nbsp; </tt>The window's
new key release callback function <br>
                                   <tt>key&nbsp;&nbsp;&nbsp;&nbsp; </tt>The 
key whose release triggers the callback <br>
                                   <tt>x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The x-coordinate of the mouse relative 
to the window at the time the key is released <br>
                                   <tt>y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The y-coordinate of the mouse relative 
to the window at the time the key is released </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutKeyboardUpFunc</tt>
" function specifies the function that <i>freeglut</i> will call when the 
user releases a key from the keyboard.&nbsp; The callback function has one 
argument:&nbsp; the name of the function to be invoked ("called back") at 
the time at which the key is released.&nbsp; The function returns no value.&nbsp; 
                                  <i>Freeglut</i> sets the <i>current window</i>
  to the window which is active when the callback is invoked. <br>
 &nbsp;&nbsp;&nbsp; While <i>freeglut</i> checks for upper or lower case
letters, it does not do so for non-alphabetical characters.&nbsp; Nor does
it account for the Caps-Lock key being on.&nbsp; The operating system may
send some unexpected characters to <i>freeglut</i>, such as "8" when the
user is pressing the Shift key.&nbsp; <i>Freeglut</i> also invokes the callback
when the user releases the Control, Alt, or Shift keys, among others.&nbsp;
Releasing the Delete key causes this function to be invoked with a value
of 127 for "<tt>key</tt>". <br>
 &nbsp;&nbsp;&nbsp; Calling "<tt>glutKeyboardUpFunc</tt>" with a NULL argument 
disables the call to the window's key release callback. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>This function is not implemented in GLUT
versions before Version 4.&nbsp; It has been designed to be as close to GLUT
as possible.&nbsp; Users who find differences should contact the        
                          <i>freeglut</i>&nbsp;Programming Consortium  to
have them fixed. </p>
                                   
                                  <h2> 12.8&nbsp; glutSpecialUpFunc</h2>
  The "<tt>glutSpecialUpFunc</tt>" function sets the window's special key
release callback. <i>Freeglut</i> calls the special key release callback
when the user releases a special key.                                   
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutSpecialUpFunc ( void (*func) 
( int key, int x, int y ) ) ;</tt> </p>
                                   
                                  <p><tt>func&nbsp;&nbsp;&nbsp; </tt>The window's
new special key release callback function <br>
                                   <tt>key&nbsp;&nbsp;&nbsp;&nbsp; </tt>The 
key whose release triggers the callback <br>
                                   <tt>x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The x-coordinate of the mouse relative 
to the window at the time the key is released <br>
                                   <tt>y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The y-coordinate of the mouse relative 
to the window at the time the key is released </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutSpecialUpFunc</tt>
" function specifies the function that <i>freeglut</i> will call when the 
user releases a special key from the keyboard.&nbsp; The callback function 
has one argument:&nbsp; the name of the function to be invoked ("called back") 
at the time at which the special key is released.&nbsp; The function returns 
no value.&nbsp; <i>Freeglut</i> sets the <i>current window</i> to the window 
which is active when the callback is invoked.&nbsp; "Special keys" are the 
function keys, the arrow keys, the Page Up and Page Down keys, and the Insert 
key.&nbsp; The Delete key is considered to be a regular key. <br>
 &nbsp;&nbsp;&nbsp; Calling "<tt>glutSpecialUpFunc</tt>" with a NULL argument 
disables the call to the window's special key release callback. </p>
                                   
                                  <p>&nbsp;&nbsp;&nbsp; The "<tt>key</tt>
" argument may take one of the following defined constant values: </p>
                                   
                                  <ul>
  <li> <tt>GLUT_KEY_F1, GLUT_KEY_F2, ..., GLUT_KEY_F12</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - F1 through F12 keys</li>
   <li> <tt>GLUT_KEY_PAGE_UP, GLUT_KEY_PAGE_DOWN</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - Page Up and Page Down keys</li>
   <li> <tt>GLUT_KEY_HOME, GLUT_KEY_END</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - Home and End keys</li>
   <li> <tt>GLUT_KEY_LEFT, GLUT_KEY_RIGHT, GLUT_KEY_UP, GLUT_KEY_DOWN</tt>
  - arrow keys</li>
   <li> <tt>GLUT_KEY_INSERT</tt>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 - Insert key</li>
                                     
                                  </ul>
  <b>Changes From GLUT</b>                                    
                                  <p>This function is not implemented in GLUT
versions before Version 4.&nbsp; It has been designed to be as close to GLUT
as possible.&nbsp; Users who find differences should contact the        
                          <i>freeglut</i>&nbsp;Programming Consortium  to
have them fixed. </p>
                                   
                                  <h2> 12.9&nbsp; glutMouseFunc</h2>
                                      
                                  <h2> 12.10&nbsp; glutMotionFunc, glutPassiveMotionFunc</h2>
                                      
                                  <h2> 12.11&nbsp; glutVisibilityFunc</h2>
                                      
                                  <h2> 12.12&nbsp; glutEntryFunc</h2>
                                      
                                  <h2> 12.13&nbsp; glutJoystickFunc</h2>
                                      
                                  <h2> 12.14&nbsp; glutSpaceballMotionFunc</h2>
    The "<tt>glutSpaceballMotionFunc</tt>" function is not implemented in 
                                  <i>freeglut</i>, although the library does 
"answer the mail" to the extent that a call to the function will not produce 
an error..                                    
                                  <p><b>Usage</b></p>
                                   
                                  <p><tt>void glutSpaceballMotionFunc ( void 
(* callback)( int x, int y, int z )</tt><tt> ) ;</tt></p>
                                   
                                  <p><b>Description</b></p>
                                   
                                  <p>The "<tt>glutSpaceballMotionFunc</tt>
 " function is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b></p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 12.15&nbsp; glutSpaceballRotateFunc</h2>
    The "<tt>glutSpaceballRotateFunc</tt>" function is not implemented in 
                                  <i>freeglut</i>, although the library does 
"answer the mail" to the extent that a call to the function will not produce 
an error..                                     
                                  <p><b>Usage</b></p>
                                   
                                  <p><tt>void glutSpaceballRotateFunc ( void 
(* callback)( int x, int y, int z )</tt><tt> ) ;</tt></p>
                                   
                                  <p><b>Description</b></p>
                                   
                                  <p>The "<tt>glutSpaceballRotateFunc</tt>
 " function is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b></p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 12.16&nbsp; glutSpaceballButtonFunc</h2>
    The "<tt>glutSpaceballButtonFunc</tt>" function is not implemented in 
                                  <i>freeglut</i>, although the library does 
"answer the mail" to the extent that a call to the function will not produce 
an error..                                     
                                  <p><b>Usage</b></p>
                                   
                                  <p><tt>void glutSpaceballButtonFunc ( void 
(* callback)( int button, int updown )</tt><tt> ) ;</tt></p>
                                   
                                  <p><b>Description</b></p>
                                   
                                  <p>The "<tt>glutSpaceballButtonFunc</tt>
 " function is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b></p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 12.17&nbsp; glutButtonBoxFunc</h2>
    The "<tt>glutSpaceballButtonBoxFunc</tt>" function is not implemented 
in <i>freeglut</i>, although the library does "answer the mail" to the extent 
that a call to the function will not produce an error..                 
                   
                                  <p><b>Usage</b></p>
                                   
                                  <p><tt>void glutSpaceballButtonBoxFunc (
void (* callback)( int button, int updown )</tt><tt> ) ;</tt></p>
                                   
                                  <p><b>Description</b></p>
                                   
                                  <p>The "<tt>glutSpaceballButtonBoxFunc</tt>
 " function is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b></p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 12.18&nbsp; glutDialsFunc</h2>
    The "<tt>glutDialsFunc</tt>" function is not implemented in <i>freeglut</i>
 , although the library does "answer the mail" to the extent that a call
to the function will not produce an error..                             
       
                                  <p><b>Usage</b></p>
                                   
                                  <p><tt>void glutDialsFunc ( void (* callback)( 
int dial, int value )</tt><tt> ) ;</tt></p>
                                   
                                  <p><b>Description</b></p>
                                   
                                  <p>The "<tt>glutDialsFunc</tt>" function 
is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b></p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 12.19&nbsp; glutTabletMotionFunc</h2>
    The "<tt>glutTabletMotionFunc</tt>" function is not implemented in <i>
 freeglut</i>, although the library does "answer the mail" to the extent
that a call to the function will not produce an error..                 
                    
                                  <p><b>Usage</b></p>
                                   
                                  <p><tt>void glutTabletMotionFunc ( void 
(* callback)( int x, int y )</tt><tt> ) ;</tt></p>
                                   
                                  <p><b>Description</b></p>
                                   
                                  <p>The "<tt>glutTabletMotionFunc</tt>" function
is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b></p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 12.20&nbsp; glutTabletButtonFunc</h2>
    The "<tt>glutTabletButtonFunc</tt>" function is not implemented in <i>
 freeglut</i>, although the library does "answer the mail" to the extent
that a call to the function will not produce an error..                 
                   
                                  <p><b>Usage</b></p>
                                   
                                  <p><tt>void glutTabletButtonFunc ( void 
(* callback)( int button, int updown, int x, int y )</tt><tt> ) ;</tt></p>
                                   
                                  <p><b>Description</b></p>
                                   
                                  <p>The "<tt>glutTabletButtonFunc</tt>" function
is not implemented in <i>freeglut</i>. </p>
                                   
                                  <p><b>Changes From GLUT</b></p>
                                   
                                  <p>GLUT implements this function. </p>
                                   
                                  <h2> 12.21&nbsp; glutMenuStatusFunc</h2>
                                      
                                  <h2> 12.22&nbsp; glutWindowStatusFunc</h2>
                                      
                                  <h1> 13.0&nbsp;<a name="StateSetting"></a>
  State Setting and Retrieval Functions</h1>
                                      
                                  <h2> 13.1&nbsp; glutSetOption</h2>
                                      
                                  <h2> 13.2&nbsp; glutGet</h2>
                                      

<p>
The following state variables may be queried with "<tt>glutGet</tt>".
The returned value is an integer.
</p>

<p>
These queries are with respect to the current window:
</p>

<ul>
<li>GLUT_WINDOW_X - window X position
<li>GLUT_WINDOW_Y - window Y position
<li>GLUT_WINDOW_WIDTH - window width
<li>GLUT_WINDOW_HEIGHT - window height
<li>GLUT_WINDOW_BUFFER_SIZE - number of color or color index bits per pixel
<li>GLUT_WINDOW_STENCIL_SIZE - number of bits per stencil value
<li>GLUT_WINDOW_DEPTH_SIZE - number of bits per depth value
<li>GLUT_WINDOW_RED_SIZE - number of bits per red value
<li>GLUT_WINDOW_GREEN_SIZE - number of bits per green value
<li>GLUT_WINDOW_BLUE_SIZE - number of bits per blue value
<li>GLUT_WINDOW_ALPHA_SIZE - number of bits per alpha value
<li>GLUT_WINDOW_ACCUM_RED_SIZE - number of red bits in the accumulation buffer
<li>GLUT_WINDOW_ACCUM_GREEN_SIZE - number of green bits in the accumulation buffer
<li>GLUT_WINDOW_ACCUM_BLUE_SIZE - number of blue bits in the accumulation buffer
<li>GLUT_WINDOW_ACCUM_ALPHA_SIZE - number of alpha bits in the accumulation buffer
<li>GLUT_WINDOW_DOUBLEBUFFER - 1 if the color buffer is double buffered, 0 otherwise
<li>GLUT_WINDOW_RGBA - 1 if the color buffers are RGB[A], 0 for color index
<li>GLUT_WINDOW_PARENT - parent window ID
<li>GLUT_WINDOW_NUM_CHILDREN - number of child windows
<li>GLUT_WINDOW_COLORMAP_SIZE - number of entries in the window's colormap
<li>GLUT_WINDOW_NUM_SAMPLES - number of samples per pixel if using multisampling
<li>GLUT_WINDOW_STEREO - 1 if the window supports stereo, 0 otherwise
<li>GLUT_WINDOW_CURSOR - current cursor
<li>GLUT_WINDOW_FORMAT_ID - on Windows, return the pixel format number of the current window
</ul>

<p>
These queries do not depend on the current window.
</p>

<ul>
<li>GLUT_SCREEN_WIDTH - width of the screen in pixels
<li>GLUT_SCREEN_HEIGHT - height of the screen in pixels
<li>GLUT_SCREEN_WIDTH_MM - width of the screen in millimeters
<li>GLUT_SCREEN_HEIGHT_MM - height of the screen in millimeters
<li>GLUT_MENU_NUM_ITEMS - number of items in the current menu
<li>GLUT_DISPLAY_MODE_POSSIBLE - return 1 if the current display mode is supported, 0 otherwise
<li>GLUT_INIT_WINDOW_X - X position last set by glutInitWindowPosition
<li>GLUT_INIT_WINDOW_Y - Y position last set by glutInitWindowPosition
<li>GLUT_INIT_WINDOW_WIDTH - width last set by glutInitWindowSize
<li>GLUT_INIT_WINDOW_HEIGHT - height last set by glutInitWindowSize
<li>GLUT_INIT_DISPLAY_MODE - display mode last set by glutInitDisplayMode
<li>GLUT_ELAPSED_TIME - time (in milliseconds) elapsed since glutInit or glutGet(GLUT_ELAPSED_TIME) was first called
<li>GLUT_INIT_STATE - ?
<li>GLUT_VERSION - Return value will be X*10000+Y*100+Z where X is the
    major version, Y is the minor version and Z is the patch level.
    This query is only supported in <i>freeglut</i> (version 2.0.0 or later).
</ul>


                                  <h2> 13.3&nbsp; glutDeviceGet</h2>
                                      
                                  <h2> 13.4&nbsp; glutGetModifiers</h2>
                                      
                                  <h2> 13.5&nbsp; glutLayerGet</h2>
                                      
                                  <h2> 13.6&nbsp; glutExtensionSupported</h2>
                                      
                                  <h2> 13.7&nbsp; glutGetProcAddress</h2>
                                  <p><tt>glutGetProcAddress</tt> returns
a pointer to a named GL or <i>freeglut</i> function. </p>
                                  <p><b>Usage</b></p>
                                  <p><tt>void *glutGetProcAddress ( const
char *procName ) ;</tt></p>
                                  <p><tt>procName&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </tt>Name of an OpenGL or GLUT function. 
                                  </p>
                                  <p><b>Description</b></p>
                                  <p><tt>glutGetProcAddress</tt> is useful
for dealing with OpenGL extensions. If an application calls OpenGL extension
functions directly, that application will only link/run with an OpenGL library
that supports the extension. By using a function pointer returned from glutGetProcAddress(),
the application will avoid this hard dependency and be more portable and interoperate
better with various implementations of OpenGL. </p>
                                  <p> Both OpenGL functions and <i>freeglut</i>
functions can be queried with this function. </p>
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h1> 14.0&nbsp;<a name="FontRendering"></a>
  Font Rendering Functions</h1>
  <i>Freeglut</i> supports two types of font rendering:&nbsp; bitmap fonts,
 which are rendered using the "<tt>glBitmap</tt>" function call, and stroke
 fonts, which are rendered as sequences of OpenGL line segments.&nbsp; Because
 they are rendered as bitmaps, the bitmap fonts tend to render more quickly
 than stroke fonts, but they are less flexible in terms of scaling and rendering.&nbsp;
 Bitmap font characters are positioned with calls to the "<tt>glRasterPos*</tt>
  " functions while stroke font characters use the OpenGL transformations
to position characters.                                    
                                  <p>&nbsp;&nbsp;&nbsp; It should be noted 
that <i>freeglut</i> fonts are similar but not identical to GLUT fonts.&nbsp; 
At the moment, <i>freeglut</i> fonts do not support the "`" (backquote) and 
"|" (vertical line) characters; in their place it renders asterisks. </p>
                                   
                                  <p>&nbsp;&nbsp;&nbsp; <i>Freeglut</i> supports 
the following bitmap fonts: </p>
                                   
                                  <ul>
  <li> <tt>GLUT_BITMAP_8_BY_13</tt> - A variable-width font with every character
 fitting in a rectangle of 13 pixels high by at most 8 pixels wide.</li>
   <li> <tt>GLUT_BITMAP_9_BY_15</tt> - A variable-width font with every character
 fitting in a rectangle of 15 pixels high by at most 9 pixels wide.</li>
   <li> <tt>GLUT_BITMAP_TIMES_ROMAN_10</tt> - A 10-point variable-width Times 
Roman font.</li>
   <li> <tt>GLUT_BITMAP_TIMES_ROMAN_24</tt> - A 24-point variable-width Times 
Roman font.</li>
   <li> <tt>GLUT_BITMAP_HELVETICA_10</tt> - A 10-point variable-width Helvetica
 font.</li>
   <li> <tt>GLUT_BITMAP_HELVETICA_12</tt> - A 12-point variable-width Helvetica
 font.</li>
   <li> <tt>GLUT_BITMAP_HELVETICA_18</tt> - A 18-point variable-width Helvetica
 font.</li>
                                     
                                  </ul>
  <i>Freeglut</i> calls "<tt>glRasterPos4v</tt>" to advance the cursor by
the width of a character and to render carriage returns when appropriate.&nbsp;
 It does not use any display lists in it rendering in bitmap fonts.     
                              
                                  <p>&nbsp;&nbsp;&nbsp; <i>Freeglut</i> supports 
the following stroke fonts: </p>
                                   
                                  <ul>
  <li> <tt>GLUT_STROKE_ROMAN</tt> - A proportionally-spaced Roman Simplex 
font</li>
   <li> <tt>GLUT_STROKE_MONO_ROMAN</tt> - A fixed-width Roman Simplex font</li>
                                     
                                  </ul>
  <i>Freeglut</i> does not use any display lists in its rendering of stroke
 fonts.&nbsp; It calls "<tt>glTranslatef</tt>" to advance the cursor by the 
width of a character and to render carriage returns when appropriate.   
                                
                                  <h2> 14.1&nbsp; glutBitmapCharacter</h2>
  The "<tt>glutBitmapCharacter</tt>" function renders a single bitmapped
character in the <i>current window</i> using the specified font.        
                           
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutBitmapCharacter ( void *font,
int character ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The bitmapped font to use in rendering 
the character <br>
                                   <tt>character&nbsp;&nbsp; </tt>The ASCII 
code of the character to be rendered </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutBitmapCharacter</tt>
  " function renders the given character in the specified bitmap font.&nbsp; 
                                  <i>Freeglut</i> automatically sets the necessary
pixel unpack storage modes and restores the existing modes when it has finished.&nbsp;
Before the first call to "<tt>glutBitMapCharacter</tt>  " the application
program should call "<tt>glRasterPos*</tt>" to set the  position of the character
in the window.&nbsp; The "<tt>glutBitmapCharacter</tt> " function advances
the cursor position as part of its call to "<tt>glBitmap</tt> " and so the
application does not need to call "<tt>glRasterPos*</tt>" again  for successive
characters on the same line. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>Nonexistent characters are rendered as
asterisks.&nbsp; The rendering position in <i>freeglut</i> is apparently off
from GLUT's position by a few pixels vertically and one or two pixels horizontally.
                                  </p>
                                   
                                  <h2> 14.2&nbsp; glutBitmapString</h2>
  The "<tt>glutBitmapString</tt>" function renders a string of bitmapped
characters in the <i>current window</i> using the specified font.       
                            
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutBitmapString ( void *font, 
char *string ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The bitmapped font to use in rendering 
the character string <br>
                                   <tt>string&nbsp;&nbsp;&nbsp; </tt>String 
of characters to be rendered </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutBitmapString</tt>
  " function renders the given character string in the specified bitmap font.&nbsp; 
                                  <i>Freeglut</i> automatically sets the necessary
pixel unpack storage modes and restores the existing modes when it has finished.&nbsp;
Before calling "<tt>glutBitMapString</tt>" the application program should
call "<tt>glRasterPos*</tt>" to set the position of the string in the window.&nbsp;
The "<tt>glutBitmapString</tt>" function handles carriage returns.&nbsp;
Nonexistent characters are rendered as asterisks. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h2> 14.3&nbsp; glutBitmapWidth</h2>
  The "<tt>glutBitmapWidth</tt>" function returns the width in pixels of
a single bitmapped character in the specified font.                     
              
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>int glutBitmapWidth ( void *font, 
int character ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The bitmapped font to use in calculating 
the character width <br>
                                   <tt>character&nbsp;&nbsp; </tt>The ASCII 
code of the character </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutBitmapWidth</tt>" 
function returns the width of the given character in the specified bitmap 
font.&nbsp; Because the font is bitmapped, the width is an exact integer.
                                   </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>Nonexistent characters return the width 
of an asterisk. </p>
                                   
                                  <h2> 14.4&nbsp; glutBitmapLength</h2>
  The "<tt>glutBitmapLength</tt>" function returns the width in pixels of
a string of bitmapped characters in the specified font.                 
                  
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>int glutBitmapLength ( void *font, 
char *string ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp; </tt>The bitmapped
font to use in calculating the character width <br>
                                   <tt>string&nbsp; </tt>String of characters 
whose width is to be calculated </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutBitmapLength</tt>
  " function returns the width in pixels of the given character string in 
the specified bitmap font.&nbsp; Because the font is bitmapped, the width 
is an exact integer:&nbsp; the return value is identical to the sum of the 
character widths returned by a series of calls to "<tt>glutBitmapWidth</tt>
".&nbsp; The width of nonexistent characters is counted to be the width of 
an asterisk. </p>
                                   
                                  <p>&nbsp;&nbsp;&nbsp; If the string contains 
one or more carriage returns, <i>freeglut</i> calculates the widths in pixels 
of the lines separately and returns the largest width. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h2> 14.5&nbsp; glutBitmapHeight</h2>
  The "<tt>glutBitmapHeight</tt>" function returns the height in pixels of
 the specified font.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>int glutBitmapHeight ( void *font 
) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The bitmapped font to use in calculating 
the character height </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutBitmapHeight</tt>
  " function returns the height of a character in the specified bitmap font.&nbsp; 
Because the font is bitmapped, the height is an exact integer.&nbsp; The fonts
are designed such that all characters have (nominally) the same height.  
                                 </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h2> 14.6&nbsp; glutStrokeCharacter</h2>
  The "<tt>glutStrokeCharacter</tt>" function renders a single stroke character
 in the <i>current window</i> using the specified font.                 
                  
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutStrokeCharacter ( void *font,
int character ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The stroke font to use in rendering 
the character <br>
                                   <tt>character&nbsp;&nbsp; </tt>The ASCII 
code of the character to be rendered </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutStrokeCharacter</tt>
  " function renders the given character in the specified stroke font.&nbsp; 
Before the first call to "<tt>glutStrokeCharacter</tt>" the application program 
should call the OpenGL transformation (positioning and scaling) functions 
to set the position of the character in the window.&nbsp; The "<tt>glutStrokeCharacter</tt>
  " function advances the cursor position by a call to "<tt>glTranslatef</tt>
  " and so the application does not need to call the OpenGL positioning functions
 again for successive characters on the same line. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>Nonexistent characters are rendered as
asterisks. </p>
                                   
                                  <h2> 14.7&nbsp; glutStrokeString</h2>
  The "<tt>glutStrokeString</tt>" function renders a string of characters
in the <i>current window</i> using the specified stroke font.           
                        
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutStrokeString ( void *font, 
char *string ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The stroke font to use in rendering 
the character string <br>
                                   <tt>string&nbsp;&nbsp;&nbsp; </tt>String 
of characters to be rendered </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutStrokeString</tt>
  " function renders the given character string in the specified stroke font.&nbsp; 
Before calling "<tt>glutStrokeString</tt>" the application program should 
call the OpenGL transformation (positioning and scaling) functions to set 
the position of the string in the window.&nbsp; The "<tt>glutStrokeString</tt>
  " function handles carriage returns.&nbsp; Nonexistent characters are rendered 
as asterisks. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h2> 14.8&nbsp; glutStrokeWidth</h2>
  The "<tt>glutStrokeWidth</tt>" function returns the width in pixels of
a single character in the specified stroke font.                        
           
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>int glutStrokeWidth ( void *font, 
int character ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The stroke font to use in calculating 
the character width <br>
                                   <tt>character&nbsp;&nbsp; </tt>The ASCII 
code of the character </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutStrokeWidth</tt>" 
function returns the width of the given character in the specified stroke 
font.&nbsp; Because the font is a stroke font, the width is actually a floating-point 
number; the function rounds it to the nearest integer for the return value.
                                   </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>Nonexistent characters return the width 
of an asterisk. </p>
                                   
                                  <h2> 14.9&nbsp; glutStrokeLength</h2>
  The "<tt>glutStrokeLength</tt>" function returns the width in pixels of
a string of characters in the specified stroke font.                    
               
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>int glutStrokeLength ( void *font, 
char *string ) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp; </tt>The stroke
font to use in calculating the character width <br>
                                   <tt>string&nbsp; </tt>String of characters 
whose width is to be calculated </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutStrokeLength</tt>
  " function returns the width in pixels of the given character string in 
the specified stroke font.&nbsp; Because the font is a stroke font, the width 
of an individual character is a floating-point number.&nbsp; <i>Freeglut</i>
  adds the floating-point widths and rounds the funal result to return the 
integer value.&nbsp; Thus the return value may differ from the sum of the 
character widths returned by a series of calls to "<tt>glutStrokeWidth</tt>
  ".&nbsp; The width of nonexistent characters is counted to be the width 
of an asterisk. </p>
                                   
                                  <p>&nbsp;&nbsp;&nbsp; If the string contains 
one or more carriage returns, <i>freeglut</i> calculates the widths in pixels 
of the lines separately and returns the largest width. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h2> 14.10&nbsp; glutStrokeHeight</h2>
  The "<tt>glutStrokeHeight</tt>" function returns the height in pixels of
 the specified font.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>GLfloat glutStrokeHeight ( void *font
) ;</tt> </p>
                                   
                                  <p><tt>font&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The stroke font to use in calculating 
the character height </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The&nbsp; "<tt>glutStrokeHeight</tt>
  " function returns the height of a character in the specified stroke font.&nbsp; 
The application programmer should note that, unlike the other <i>freeglut</i>
  font functions, this one returns a floating-point number.&nbsp; The fonts 
are designed such that all characters have (nominally) the same height. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include this function.
                                   </p>
                                   
                                  <h1> 15.0&nbsp;<a name="GeometricObject"></a>
  Geometric Object Rendering Functions</h1>
  <i>Freeglut</i> includes eighteen routines for generating easily-recognizable
 3-d geometric objects.&nbsp; These routines are effectively the same ones
 that are included in the GLUT library, and reflect the functionality available
 in the <i>aux</i> toolkit described in the <i>OpenGL Programmer's Guide</i>
  .&nbsp; They are included to allow programmers to create with a single
line of code a three-dimensional object which can be used to test a variety
of OpenGL functionality.&nbsp; None of the routines generates a display list 
for the object which it draws.&nbsp; The functions generate normals appropriate 
for lighting but, except for the teapon functions, do not generate texture 
coordinates.                                    
                                  <h2> 15.1&nbsp; glutWireSphere, glutSolidSphere</h2>
  The "<tt>glutWireSphere</tt>" and "<tt>glutSolidSphere</tt>" functions
draw a wireframe and solid sphere respectively.                         
          
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireSphere ( GLdouble dRadius, 
GLint slices, GLint stacks ) ;</tt> </p>
                                   
                                  <p><tt>void glutSolidSphere ( GLdouble dRadius,
GLint slices, GLint stacks ) ;</tt> </p>
                                   
                                  <p><tt>dRadius&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired radius of the sphere </p>
                                   
                                  <p><tt>slices&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired number of slices (divisions 
in the longitudinal direction) in the sphere </p>
                                   
                                  <p><tt>stacks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired number of stacks (divisions 
in the latitudinal direction) in the sphere.&nbsp; The number of points in 
this direction, including the north and south poles, is <tt>stacks+1</tt>
  </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireSphere</tt>" and "<tt>
  glutSolidSphere</tt>" functions render a sphere centered at the origin
of the modeling coordinate system.&nbsp; The north and south poles of the
sphere are on the positive and negative Z-axes respectively and the prime
meridian crosses the positive X-axis. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.2&nbsp; glutWireTorus, glutSolidTorus</h2>
  The "<tt>glutWireTorus</tt>" and "<tt>glutSolidTorus</tt>" functions draw
 a wireframe and solid torus (donut shape) respectively.                
                   
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireTorus ( GLdouble dInnerRadius, 
GLdouble dOuterRadius, GLint nSides, GLint nRings ) ;</tt> </p>
                                   
                                  <p><tt>void glutSolidTorus ( GLdouble dInnerRadius, 
GLdouble dOuterRadius, GLint nSides, GLint nRings ) ;</tt> </p>
                                   
                                  <p><tt>dInnerRadius&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired inner radius of the torus, 
from the origin to the circle defining the centers of the outer circles </p>
                                   
                                  <p><tt>dOuterRadius&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired outer radius of the torus, 
from the center of the outer circle to the actual surface of the torus </p>
                                   
                                  <p><tt>nSides&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired number of segments in a
single outer circle of the torus </p>
                                   
                                  <p><tt>nRings&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired number of outer circles 
around the origin of the torus </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireTorus</tt>" and "<tt>
  glutSolidTorus</tt>" functions render a torus centered at the origin of 
the modeling coordinate system.&nbsp; The torus is circularly symmetric about 
the Z-axis and starts at the positive X-axis. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.3&nbsp; glutWireCone, glutSolidCone</h2>
  The "<tt>glutWireCone</tt>" and "<tt>glutSolidCone</tt>" functions draw
a wireframe and solid cone respectively.                                
   
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireCone ( GLdouble base, 
GLdouble height, GLint slices, GLint stacks ) ;</tt> </p>
                                   
                                  <p><tt>void glutSolidCone ( GLdouble base, 
GLdouble height, GLint slices, GLint stacks ) ;</tt> </p>
                                   
                                  <p><tt>base&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired radius of the base of the
cone </p>
                                   
                                  <p><tt>height&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired height of the cone </p>
                                   
                                  <p><tt>slices&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired number of slices around 
the base of the cone </p>
                                   
                                  <p><tt>stacks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired number of segments between 
the base and the tip of the cone (the number of points, including the tip, 
is <tt>stacks + 1</tt>) </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireCone</tt>" and "<tt>
  glutSolidCone</tt>" functions render a right circular cone with a base
centered at the origin and in the X-Y plane and its tip on the positive Z-axis.&nbsp; 
The wire cone is rendered with triangular elements. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.4&nbsp; glutWireCube, glutSolidCube</h2>
  The "<tt>glutWireCube</tt>" and "<tt>glutSolidCube</tt>" functions draw
a wireframe and solid cube respectively.                                
   
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireCube ( GLdouble dSize 
) ;</tt> </p>
                                   
                                  <p><tt>void glutSolidCube ( GLdouble dSize 
) ;</tt> </p>
                                   
                                  <p><tt>dSize&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired length of an edge of the 
cube </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireCube</tt>" and "<tt>
  glutSolidCube</tt>" functions render a cube of the desired size, centered 
at the origin.&nbsp; Its faces are normal to the coordinate directions. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.5&nbsp; glutWireTetrahedron, glutSolidTetrahedron</h2>
  The "<tt>glutWireTetrahedron</tt>" and "<tt>glutSolidTetrahedron</tt>"
functions draw a wireframe and solid tetrahedron (four-sided Platonic solid)
respectively.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireTetrahedron ( void )
;</tt> </p>
                                   
                                  <p><tt>void glutSolidTetrahedron ( void 
) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireTetrahedron</tt>" and 
"<tt>glutSolidTetrahedron</tt>" functions render a tetrahedron whose corners 
are each a distance of one from the origin.&nbsp; The length of each side 
is 2/3 sqrt(6).&nbsp; One corner is on the positive X-axis and another is 
in the X-Y plane with a positive Y-coordinate. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.6&nbsp; glutWireOctahedron, glutSolidOctahedron</h2>
  The "<tt>glutWireOctahedron</tt>" and "<tt>glutSolidOctahedron</tt>" functions
 draw a wireframe and solid octahedron (eight-sided Platonic solid) respectively.
                                   
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireOctahedron ( void ) 
;</tt> </p>
                                   
                                  <p><tt>void glutSolidOctahedron ( void )
;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireOctahedron</tt>" and 
"<tt>glutSolidOctahedron</tt>" functions render an octahedron whose corners 
are each a distance of one from the origin.&nbsp; The length of each side 
is sqrt(2).&nbsp; The corners are on the positive and negative coordinate 
axes. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.7&nbsp; glutWireDodecahedron, glutSolidDodecahedron</h2>
  The "<tt>glutWireDodecahedron</tt>" and "<tt>glutSolidDodecahedron</tt>
"  functions draw a wireframe and solid dodecahedron (twelve-sided Platonic
solid) respectively.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireDodecahedron ( void 
) ;</tt> </p>
                                   
                                  <p><tt>void glutSolidDodecahedron ( void 
) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireDodecahedron</tt>" and
"<tt>glutSolidDodecahedron</tt>" functions render a dodecahedron whose corners
are each a distance of sqrt(3) from the origin.&nbsp; The length of each
side is sqrt(5)-1.&nbsp; There are twenty corners; interestingly enough,
eight of them coincide with the corners of a cube with sizes of length 2.
                                  </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.8&nbsp; glutWireIcosahedron, glutSolidIcosahedron</h2>
  The "<tt>glutWireIcosahedron</tt>" and "<tt>glutSolidIcosahedron</tt>"
functions draw a wireframe and solid icosahedron (twenty-sided Platonic solid)
respectively.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireIcosahedron ( void )
;</tt> </p>
                                   
                                  <p><tt>void glutSolidIcosahedron ( void 
) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireIcosahedron</tt>" and 
"<tt>glutSolidIcosahedron</tt>" functions render an icosahedron whose corners 
are each a unit distance from the origin.&nbsp; The length of each side is 
slightly greater than one.&nbsp; Two of the corners lie on the positive and 
negative X-axes. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h2> 15.7&nbsp; glutWireRhombicDodecahedron, 
glutSolidRhombicDodecahedron</h2>
  The "<tt>glutWireRhombicDodecahedron</tt>" and "<tt>glutSolidRhombicDodecahedron</tt>
  " functions draw a wireframe and solid rhombic dodecahedron (twelve-sided
 semi-regular solid) respectively.                                    
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireRhombicDodecahedron 
( void ) ;</tt> </p>
                                   
                                  <p><tt>void glutSolidRhombicDodecahedron 
( void ) ;</tt> </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireRhombicDodecahedron</tt>
  " and "<tt>glutSolidRhombicDodecahedron</tt>" functions render a rhombic 
dodecahedron whose corners are at most a distance of one from the origin.&nbsp; 
The rhombic dodecahedron has faces which are identical rhombuses (rhombi?) 
but which have some vertices at which three faces meet and some vertices at
which four faces meet.&nbsp; The length of each side is sqrt(3)/2.&nbsp; Vertices
at which four faces meet are found at (0, 0, <u>+</u>1) and (<u>  +</u>sqrt(2)/2,
                                  <u>+</u>sqrt(2)/2, 0). </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>GLUT does not include these functions.
                                   </p>
                                   
                                  <h2> 15.10&nbsp; glutWireTeapot, glutSolidTeapot</h2>
  The "<tt>glutWireTeapot</tt>" and "<tt>glutSolidTeapot</tt>" functions
draw a wireframe and solid teapot respectively.                         
          
                                  <p><b>Usage</b> </p>
                                   
                                  <p><tt>void glutWireTeapot ( GLdouble dSize 
) ;</tt> </p>
                                   
                                  <p><tt>void glutSolidTeapot ( GLdouble dSize
) ;</tt> </p>
                                   
                                  <p><tt>dSize&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  </tt>The desired size of the teapot </p>
                                   
                                  <p><b>Description</b> </p>
                                   
                                  <p>The "<tt>glutWireTeapot</tt>" and "<tt>
  glutSolidTeapot</tt>" functions render a teapot of the desired size, centered 
at the origin.&nbsp; This is the famous OpenGL teapot [add reference]. </p>
                                   
                                  <p><b>Changes From GLUT</b> </p>
                                   
                                  <p>None that we know of. </p>
                                   
                                  <h1> 16.0&nbsp;<a name="GameMode"></a>
  Game Mode Functions</h1>
                                      
                                  <h2> 16.1&nbsp; glutGameModeString</h2>
                                      
                                  <h2> 16.2&nbsp; glutEnterGameMode, glutLeaveGameMode</h2>
                                      
                                  <h2> 16.3&nbsp; glutGameModeGet</h2>
                                      
                                  <h1> 17.0&nbsp;<a name="VideoResize"></a>
  Video Resize Functions</h1>
                                      
                                  <h2> 17.1&nbsp; glutVideoResizeGet</h2>
                                      
                                  <h2> 17.2&nbsp; glutSetupVideoResizing, 
glutStopVideoResizing</h2>
                                      
                                  <h2> 17.3&nbsp; glutVideoResize</h2>
                                      
                                  <h2> 17.4&nbsp; glutVideoPan</h2>
                                      
                                  <h1> 18.0&nbsp;<a name="ColorMap"></a>
  Color Map Functions</h1>
                                      
                                  <h2> 18.1&nbsp; glutSetColor, glutGetColor</h2>
                                      
                                  <h2> 18.2&nbsp; glutCopyColormap</h2>
                                      
                                  <h1> 19.0&nbsp;<a name="Miscellaneous"></a>
  Miscellaneous Functions</h1>
                                      
                                  <h2> 19.1&nbsp; glutIgnoreKeyRepeat, glutSetKeyRepeat</h2>
                                      
                                  <h2> 19.2&nbsp; glutForceJoystickFunc</h2>
                                      
                                  <h2> 19.3&nbsp; glutReportErrors</h2>
                                      
                                  <h1> 20.0&nbsp;<a name="UsageNotes"></a>
  Usage Notes</h1>
                                      
                                  <p> The following environment variables
are recognized by <i>freeglut</i>: </p>
                                  <ul>
                                    <li>DISPLAY - specifies a display name.<br>
                                    </li>
                                    <li>GLUT_FPS - specifies a time interval
(in milliseconds) for reporting framerate messages to stderr.  For example,
if FREEGLUT_FPS is set to 5000, every 5 seconds a message will be printed
to stderr showing the current frame rate.  The frame rate is measured by counting
the number of times glutSwapBuffers() is called over the time interval.</li>
                                    <li>GLUT_ICON - specifies the icon that
goes in the upper left-hand corner of the <i>freeglut</i><i> </i>windows </li>
                                  </ul>
                                  <h1> 21.0&nbsp;<a name="ImplementationNotes"></a>
  Implementation Notes</h1>
                                      
<h1> 22.0&nbsp;<a name="GLUT_State"></a>
GLUT State</h1>
                                      
<h1> 23.0&nbsp;<a name="Freeglut.h_Header"></a>
"freeglut.h" Header File</h1>
                                      

<p>
Application programmers who are porting their GLUT programs to <i>freeglut</i> may continue
to include <tt>&lt;GL/glut.h&gt;</tt> in their programs.
Programs which use the <i>freeglut</i>-specific extensions to GLUT should include
<tt>&lt;GL/freeglut.h&gt;</tt>.  One possible arrangement is as follows:
</p>

<pre>
#ifdef FREEGLUT
#include &lt;GL/freeglut_ext.h&gt;
#else
#include &lt;GL/glut.h&gt;
#endif
</pre>

<p>
Compile-time <i>freeglut</i> version testing can be done as follows:
</p>

<pre>
#ifdef FREEGLUT_VERSION_2_0
  code specific to freeglut 2.0 or later here
#endif
</pre>

<p>
In future releases, FREEGLUT_VERSION_2_1, FREEGLUT_VERSION_2_2, etc will
be defined.  This scheme mimics OpenGL conventions.
</p>

<p>
The <i>freeglut</i> version can be queried at runtime by calling
glutGet(GLUT_VERSION).
The result will be X*10000+Y*100+Z where X is the major version, Y is the
minor version and Z is the patch level.
</p>
<p>
This may be used as follows:
</p>

<pre>
if (glutGet(GLUT_VERSION) < 20001) {
    printf("Sorry, you need freeglut version 2.0.1 or later to run this program.\n");
    exit(1);
}
</pre>



<h1> 24.0&nbsp;<a name="References"></a>
References</h1>
                                      
<h1> 25.0&nbsp;<a name="Index"></a>
Index</h1>
&nbsp;                                    
<p>&nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; <br>
 &nbsp; </p>
                                   

<?PHP
generateFooter();
?>